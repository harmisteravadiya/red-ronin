<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\reviews;
use App\Models\mangas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class product extends Controller
{
    public function add_product(Request $req){
        $req->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'category'=>'required',
            'stock'=>'required',
            'desc'=>'required',
            'pic' => 'required|max:1000|mimes:jpg,png,gif,jpeg,webp'

        ],[
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 1 MB',
            'pic.mimes' => 'Select jpg or png file to uplaod',
        ]);
        $data=products::where('product_name',$req->name)->first();
        if($data){
            session()->flash('err',"Product Already exists");
            return redirect('add_prodduct');
        }else{
            $products = new products(); 
            $products->product_name=$req->name;
            $products->category=$req->category;
            $products->price=$req->price;
            $products->stock=$req->stock;
            $products->description=$req->desc;
            $products->sell_count=0;
            $products->rating=1;
            $products->release_date=date('Y-m-d');
            
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('Images/products/', $pic_name);
            $products->pic=$pic_name;
            
            if($products->save()){
                session()->flash('succ',"Product Addesd");
            }
            else{
                session()->flash('succ',"Not Added");
            }
    
            return redirect('add_product');
        }
    }


    public function showAllProducts(){
        $result=products::paginate(5);
        $count=DB::table('products')->get()->count();
        return view('manage_products',compact('result','count'));
    }

    public function searchAllProducts(){
        $result=products::where('status','Active')->paginate(12);
        $count=DB::table('products')->get()->count();
        return view('search_product',compact('result','count'));
    }

    public function category_search($category){
        if($category=="mangas"){
         
        // $result=mangas::where('status','Active')->paginate(30);
        // $count=DB::table('mangas')->get()->count();  
        return redirect('manga'); 
        }else{
        $result=products::where('category',$category)->paginate(30);
        $count=DB::table('products')->get()->count();

        }
        return view('category_based_product',compact('result','count'));
    }
    public function delete_product($id){
        DB::delete('delete from products where product_id = ?',[$id]);
            return redirect('manage_products');
    }

    public function deactivate_product($id){
        $result=products::where('product_id',$id)->update(array('Status'=>'Inactive'));
            return redirect('manage_products');
        }

    public function activate_product($id){
        $result=products::where('product_id',$id)->update(array('Status'=>'Active'));
        return redirect('manage_products');   
    }
    

    public function fetch_product_details($id){
        $result=products::where('product_id',$id)->first();
        return view('edit_product', compact('result'));
    }

    

    public function update_product(Request $req,$id){
        $req->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'stock'=>'required',
            'desc'=>'required',
            'pic' => 'max:1000|mimes:jpg,png,gif,jpeg,webp'

        ],[
          
            'pic.max' => 'Select a file of max 1 MB',
            'pic.mimes' => 'Select jpg or png file to uplaod',
        ]);


        $result=products::where('product_id',$id)->first();
        
        if ($req->hasFile('pic')) {
            $file_name = "Images/products/" . $result['pic'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('Images/products/', $pic_name);
            $result->where('product_id', $id)->update(array('product_name' => $req->name, 'price' => $req->price, 'stock' => $req->stock, 'category' => $req->category, 'description' => $req->desc, 'pic' => $pic_name));
        
            }else{
                    $result->where('product_id', $id)->update(array('product_name' => $req->name, 'price' => $req->price, 'stock' => $req->stock, 'category' => $req->category, 'description' => $req->desc));
                }
               return redirect('manage_products');
    }

            public function search(Request $request)
                {
                if($request->ajax())
                {
                $output="";
                $result=DB::table('products')->where('product_name','LIKE','%'.$request->search."%")->get();
                if($result)
                {
                foreach ($result as $data) {
                    if($data->status=="Inactive"){          
                        $activete='<a href="'.URL::to('/').'/activate_product/ '.$data->product_id.'"><button type="button" class="btn btn-primary">Activate</button></a>
                                ';
                    }
                     else{
                            $activete='<a href="'.URL::to('/').'/deactivate_product/ '.$data->product_id.'"><button type="button" class="btn btn-primary">Deactivate</button></a>
                            ';
                        }
                            $output.=
                            '<tr class="border-bottom align-self-center text-center">
                
                                                    <td><div class="d-flex justify-content-center">
                                                        <img src="Images/products/' .$data->pic. '" class="img mx-2 align-text-center" alt="product" height="70px" width="70px"></div></td>
                                                        <td>' .$data->product_id. '</td>
                                                    <td class="text-center"> '. $data->product_name.'</td>
                                                    <td>' .$data->price. '</td>
                                                    <td>'. $data->stock.'</td>
                                                    <td>'. $data->sell_count.'</td>
                                                    <td>' .$data->description. '</td>
                                                    <td><a href="edit_product/'. $data->product_id.'"><button type="button" class="btn btn-info">Edit</button></a> </td>
                                                    <td>'.$activete .' </td>
                                                    <td><a href="delete_product/'. $data->product_id.'"><button type="button" class="btn btn-danger">Delete</button></a> </td>

                                                </tr>';
                
                             }
                            return Response($output);
                        }
                   }
    }
     
    public function home(){
        $popular=products::where('status','Active')->orderBy('sell_count','DESC')->limit(4)->get();
        $new=products::where('status','Active')->orderBY('release_date','DESC')->limit(4)->get();
        return view('home_page',compact('popular','new'));
    }    


    
    public function productDetails($id,$category){
        $result=products::where('product_id',$id)->get()->first();
        $similar=products::where('category',$category)->where('product_id','!=',$id)->limit(3)->get();
        $review=DB::table('reviews')
        ->join('registered_users', 'reviews.id', '=', 'registered_users.id')->where('product_id',$id)
        ->select('registered_users.name','registered_users.pic', 'reviews.rating', 'reviews.review','reviews.date')
        ->get();
        return view('product_detail_page',compact('result','similar','review'));
    }
        
    public function add_review(Request $req,$id){

        $req->validate([
            'review'=>'required'
        ],[
            'review.required'=>'Review field cannot be empty'
        ]);


        $result=products::where('product_id',$id)->first();
        $reg=new reviews();
        $reg->id=session()->get('id');
        $reg->product_id=$id;
        $reg->manga_id="";
        $reg->user=session()->get('name');
        $reg->product_name=$result['product_name'];
        $reg->manga_name="";
        $reg->pic=$result['pic'];
        $reg->email=session()->get('email');
        $reg->rating=$req->rating;
        $reg->review=$req->review;
        // $reg->mobile=$req->mobile;
        $reg->date=date('Y-m-d');

        $reg->save();
        return redirect()->back();

    }


public function showAllReviews(){
    $result=reviews::paginate(10);
    $count=DB::table('reviews')->get()->count();
    return view('manage_reviews',compact('result','count'));
}

    public function delete_review($id){
        DB::delete('delete from reviews where review_id = ?',[$id]);
        return redirect('manage_reviews');
    }


    public function search_review(Request $request)
    {
    if($request->ajax())
    {
    $output="";
    $result=DB::table('reviews')->where('product_name','LIKE','%'.$request->search."%")->orWhere('manga_name','LIKE','%'.$request->search."%") ->get();
    if($result)
    {
    foreach ($result as $data) {
        if($data->manga_id==0){          
        $img='<img src="Images/products/' .$data->pic. '" class="img mx-2 align-text-center" alt="product" height="90px" width="90px">';
        $name=$data->product_name;
        }
         else{
            $img='<img src="Images/manga/' .$data->pic. '" class="img mx-2 align-text-center" alt="product" height="120px" width="90px">';
            $name=$data->manga_name;

        }
        
                $output.=
                '<tr class="border-bottom align-self-center text-center">
    
                                        <td><div class="d-flex justify-content-center">
                                            '.$img.'</div></td>
                                            <td>' .$name. '</td>
                                        <td class="text-center"> '. $data->user.'</td>
                                        <td>' .$data->rating. '</td>
                                        <td>'. $data->review.'</td>
                                        <td><a href="delete_review/'. $data->review_id.'"><button type="button" class="btn btn-danger">Delete</button></a> </td>

                                    </tr>';
    
                 }
                return Response($output);
            }
       }
}



public function sort(Request $request)
{
if($request->ajax())
{
$output="";
$result=products::where('status','Active')->orderBy('release_date','DESC')->paginate(12);

if($result)
{
foreach ($result as $data) {
    
            $output.=
            '<a href="'.URL::to('/') .'/product_detail/ '.$data->product_id .'/'.$data->category.'" style="color: white">  <div class="card product-item border mb-4">
            <div class="card-header product-img position-relative overflow-hidden bg-transparent  p-0">
                <img class="img-fluid" src="'.URL::to('/') .'/Images/products/'. $data->pic.'"  style="height: 260px;width:460px"  alt="">
            </div>
            <div class="card-body text-left p-0 pt-4 pb-3 px-3">
                <h5 class="text-truncate mb-3">'. $data->product_name.'</h5>
                <div class="d-flex justify-content-left">
                   
                </div>
                <h6>₹'.$data->price.'</h6>
                <div class="d-flex ">
                    <div class="text-warning mb-1 me-2">
                      <i class="fa fa-star"></i>
                      <span class="ms-1">
                    '. $data->rating.' <span class="text-light">( '. $data->stock.' )</span>
                      </span>
                    </div>
                </div>  

                <a href="'. URL::to('/').'/add_product_cart/ '. $data->product_id.'" class="btn btn-success shadow-0 py-2 mx-3"> Buy now </a>
                <a href="'. URL::to('/') .'/add_product_cart/ '. $data->product_id.'" class="btn btn-primary shadow-0 py-2 "> <i class="me-1 fa fa-shopping-basket"></i> Add to cart </a>
            </div>
        </div>
      </a>';

             }
            return Response($output);
        }
   }
}
}
