<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\order;
use App\Models\cart;
use App\Models\mangas;
use App\Models\products;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Mail;


class orders extends Controller
{

    public function checkout($id){

        $result=cart::where('user_id',$id)->get();
        $total=cart::where('user_id',$id)->sum('price');
        $totalPrice=0;
        foreach ($result as $data) {
            $total=$data->price*$data->quantity;
            $totalPrice=$totalPrice+$total;
            
        }
        
        
        return view('checkout',compact('result','totalPrice'));
        
    }

    public function checkout_action(Request $req){
        $req->validate([
            'fname'=>'required|min:2',
            'mobile'=>'required|digits:10',
            'city'=>'required',
            'address'=>'required',
            'pin'=>'required'

        ],[
            'fname.required' => 'Full name cannot be empty',
            'fname.min' => 'Full name must contain minimum 2 characters',
            'email.email' => 'Invalid email address',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
        ]);

        $result=cart::where('user_id',session()->get('id'))->get();
        $total=cart::where('user_id',session()->get('id'))->sum('price');
        $totalPrice=0;
        $quantity=0;
        $mangaid="";
        $productid="";
        $product_name="";
        $manga_name="";
        foreach ($result as $data) {
            $total=$data->price*$data->quantity;
            $totalPrice=$totalPrice+$total;
            $quantity=$quantity+$data->quantity;
            if($mangaid==""){
            if($data->manga_id==0){}
            else{ $mangaid=$data->manga_id;}
        }else{ 
            if($data->manga_id==0){}
            else{ $mangaid=$mangaid.','.$data->manga_id;}
            }

        

        if($productid==""){
            if($data->product_id==0){}
            else{ $productid=$data->product_id;}
        }else{ 
            if($data->product_id==0){}
            else{ $productid=$productid.','.$data->product_id;}
            }

            if($manga_name==""){
                if($data->manga_name==0){}
                else{ $manga_name=$data->manga_name;}
            }else{ 
                if($data->manga_name==0){}
                else{ $manga_name=$manga_name.','.$data->manga_name;}
                }
    
            
    
            if($product_name==""){
                if($data->product_name==0){}
                else{ $product_name=$data->product_name;}
            }else{ 
                if($data->product_name==0){}
                else{ $product_name=$product_name.','.$data->product_name;}
                }
    
        }
    
        if($mangaid==null){
            $mangaid=0;
        }
        
        if($productid==null){
            $productid=0;
        }

        $item_name=$product_name.','.$manga_name;
        $reg=new order();
        
        $reg->product_id=$productid;
        $reg->name=$req->fname;
        $reg->email=session()->get('email');
        $reg->mobile=$req->mobile;
        $reg->manga_id=$mangaid;
        $reg->amount=$totalPrice;
        $reg->address=$req->address.",".$req->house.",". $req->city;
        $reg->pincode=$req->pin;
        $reg->shipping_method=$req->shipping;
        $reg->payment_method=$req->payment;
        $reg->quantity=$quantity;
        $reg->date=date('Y-m-d');
        $reg->item_name=$item_name;

    
        
       if($reg->save()){

        $total=cart::where('user_id',session()->get('id'))->sum('price');
        // $stock=DB::table('products')->join('cart','cart.product_id','=','products.product_id')
        // ->select('products.product_id','products.stock','products.sell_count','cart.quantity','cart.price');
        $totalPrice=0;
        foreach($result as $data){
            DB::update('update products SET sell_count=sell_count + ?,stock=stock - ? where product_id = ?',[$data->quantity,$data->quantity,$data->product_id]);
            DB::update('update mangas SET sell_count=sell_count + ?,stock=stock - ? where manga_id = ?',[$data->quantity,$data->quantity,$data->manga_id]);
            // products::where('product_id',$data->product_id)->update(array("stock"=>($data->stock-$data->quantity),'sell_count'=>($data->sell_count+$data->quantity)));
            $total=$data->price*$data->quantity;
            $totalPrice=$totalPrice+$total;
        }
        // $name = "";
        $name=session()->get('name');
        // dd($name);
        $data=['item'=> $result,'total'=> $totalPrice,'email'=>session()->get('email'), 'name'=>$name];
        Mail::send("order_details",['data'=>$data],function($message)use($data){
            $message->to($data['email'],$data['name']);
            $message->from("redronin106@gmail.com","Red Ronin");
        });
        DB::delete('delete from cart where user_id = ?',[session()->get('id')]);
        return redirect('user_profile');

       }else{
        return redirect('cart');
       }

    }


    public function add_product_cart($id){
        $result=DB::table('products')->where('product_id',$id)->first();
        $cart=DB::table('cart')->where('product_id',$id)->where('user_id',session()->get('id'))->first(); 
        // dd($cart);
        if($cart){

            $data=DB::table('cart')->where('product_id',$id)->where('user_id',session()->get('id'))->increment('quantity'); 
            if($data){
                return redirect('cart');
            }else
            {
                return redirect()->back();
            }

            
    }else{
    
        $reg=new cart();
        $reg->product_id=$id;
        $reg->user_id=session()->get('id');
        $reg->product_name=$result->product_name;
        $reg->manga_id=0;
        $reg->manga_name="";
        $reg->pic=$result->pic;
        $reg->quantity=1;
        $reg->price=$result->price;
        
        if($reg->save()){
            return redirect('cart');
        }else
        {
            return redirect()->back();
        }
    }



    }

    public function showCartItems(){
        $result=cart::all()->where('user_id',session()->get('id'));
        $count=cart::all()->where('user_id',session()->get('id'))->count();
        $total=cart::where('user_id',session()->get('id'))->sum('price');
        $totalPrice=0;
        foreach ($result as $data) {
            $total=$data->price*$data->quantity;
            $totalPrice=$totalPrice+$total;
        }
        return view('product_cart',compact('result','count','totalPrice'));
    }

    public function delete_product_cart($id){
        $result=DB::table('cart')->where('cart_item_id',$id)->first();
        DB::delete('delete from cart where cart_item_id = ?',[$id]);
            return redirect('cart');
    
    }
    public function add_manga_cart($id){
        
        $result=DB::table('mangas')->where('manga_id',$id)->first();
        $reg=new cart();
        $reg->manga_id=$id;
        $reg->user_id=session()->get('id');
        $reg->manga_name=$result->manga_name;
        $reg->product_id=0;
        $reg->product_name="";
        $reg->pic=$result->pic;
        $reg->quantity=1;
        $reg->price=$result->price;
        
        if($reg->save()){
            return redirect('cart');
        }else
        {
            return redirect()->back();
        }
    }



    public function increase_quantity($id){
        $result=DB::table('cart')->where('cart_item_id',$id)->first();
        cart::where('cart_item_id',$id)->update(array("quantity"=>($result->quantity+1)));
            return redirect()->back();
    
    }public function decrease_quantity($id){
        $result=DB::table('cart')->where('cart_item_id',$id)->first();
        cart::where('cart_item_id',$id)->update(array("quantity"=>($result->quantity-1)));
        $quantity=DB::table('cart')->where('cart_item_id',$id)->first();
        if($quantity->quantity<1){
            $this->delete_product_cart($id);
            return redirect('cart');
        }else{
            return redirect()->back();
        }
    }

    public function delete_order($id){
        $result=DB::table('orders')->where('order_id',$id)->first();
        DB::delete('delete from orders where order_id = ?',[$id]);
            return redirect('manage_orders');
    
    }

    public function getAllOrders(){
        $result=DB::table('orders')->where('order_id','!=',0)->paginate(5);
        $total=DB::table('orders')->count();
        return view('manage_orders',compact('result','total'));
    }





    public function delivered($id){
        $result=order::where('order_id',$id)->update(array('delivery_status'=>'Delivered','payment_status'=>'Paid'));
            return redirect('manage_orders');
        }

    public function pending($id){
        $result=order::where('order_id',$id)->update(array('delivery_status'=>'Not delivered','payment_status'=>'Not Paid'));
        return redirect('manage_orders');   
    }


    
    public function myOrders($id){

        $result=DB::table('orders')->where('user_id',$id)->get();
        $mangaid="";
        $productid="";
        $item=[];
        $i=0;
        foreach($result as $data){
            // $mangaid=$data->manga_id;
            // $productid=$data->product_id;
            
            
            if($mangaid==""){
                if($data->manga_id==0){}
                else{ $mangaid=$data->manga_id; }
            }else{ 
                if($data->manga_id==0){}
                else{ $mangaid=$data->manga_id; }
                }
    
                if($productid==""){
                    if($data->product_id==0){}
                    else{ $productid=$data->product_id;}
                }else{ 
                    if($data->product_id==0){}
                    else{ $productid=$data->product_id;}
                    }
        
      
        $manga_name="";
        foreach(explode(',',$mangaid) as $data){
            $name=DB::table('mangas')->where('manga_id',$data)->first();
            if($manga_name==""){
                if($name->manga_id==0){}
                else{ $manga_name=$name->manga_name; }
            }else{ 
                if($name->manga_id==0){}
                else{ $manga_name=$manga_name.','.$name->manga_name; }
                }
            // $temp=$name->manga_name;
            
        }
        $product_name="";
        foreach(explode(',',$productid) as $data){
            $name=DB::table('products')->where('product_id',$data)->first();
            if($product_name==""){
                if($name->product_id==0){}
                else{ $product_name=$name->product_name; }
            }else{ 
                if($name->product_id==0){}
                else{ $product_name=$product_name.','.$name->product_name; }
                }
        
        }
        
        $item[]=($manga_name.','.$product_name);
        
    }
        
        // $product_name=
        return $item;
        // return view('manage_orders',compact('result','item'));
    }


    public function search_order(Request $request)
                    {
                    if($request->ajax())
                    {
                    $output="";
                    $result=DB::table('orders')->where('item_name','LIKE','%'.$request->search."%")->get();
                    if($result)
                    {
                    foreach ($result as $data) {
                        if($data->delivery_status=="Not delivered"){
                            $activete='<a href="'.URL::to('/').'/delivered/ '.$data->order_id.'"><button type="button" class="btn btn-primary">Complete</button></a>
                            ';
                        }
                        else{
                            $activete='<a href="'.URL::to('/').'/pending/ '.$data->email.'"><button type="button" class="btn btn-primary">Pending</button></a>
                            ';
                        }
                                $output.=
                                     '<tr class="border-bottom align-self-center text-center">

                                    <td>'.$data->order_id.'</td>
                                    <td class="text-center"> '. $data->item_name.'</td>
                                    <td>' .$data->amount. '</td>
                                    <td>'. $data->mobile.'</td>
                                    <td>'. $data->quantity.'</td>
                                    <td>'. $data->date.'</td>
                                    <td>'. $data->payment_status.'</td>
                                    <td>'. $data->delivery_status.'</td>
                                    <td>'.$activete .' </td>
                                    <td><a href="delete_order/'. $data->order_id.' "><button type="button" class="btn btn-danger">Delete</button></a> </td>
                                
                                </tr>';

                                }
                                return Response($output);        
                                   }
                                   }
        }



        

}




