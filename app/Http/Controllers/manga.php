<?php

namespace App\Http\Controllers;

use App\Models\mangas;
use App\Models\reviews;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\File;

class manga extends Controller
{
    public function add_manga(Request $req){
        $req->validate([
            'name'=>'required|min:5',
            'price'=>'required',
            'writer'=>'required',
            'stock'=>'required',
            'desc'=>'required',
            'pic' => 'required|max:1000|mimes:jpg,png,gif,jpeg,webp'

        ],[
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 1 MB',
            'pic.mimes' => 'Select jpg or png file to uplaod',
        ]);

        $data=mangas::where('manga_name',$req->name)->first();
        if($data){
            session()->flash('err',"Manga Already exists");
            return redirect('add_manga');
        }else{
            $products = new mangas(); 
            $products->manga_name=$req->name;
            $products->writer=$req->writer;
            $products->price=$req->price;
            $products->stock=$req->stock;
            $products->description=$req->desc;
            $products->sell_count=0;
            $products->rating=1;
            $products->release_date=date('Y-m-d');
            
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('Images/manga/', $pic_name);
            $products->pic=$pic_name;
            
            if($products->save()){
                session()->flash('succ',"Manga Added");
            }
            else{
                session()->flash('succ',"Not Added");
            }
    
            return redirect('add_manga');
        }
    }

    public function showAllMangas(){
        $result=mangas::paginate(10);
        $count=DB::table('mangas')->get()->count();
        return view('manage_manga',compact('result','count'));
    }

    public function delete_manga($id){
        DB::delete('delete from mangas where manga_id = ?',[$id]);
            return redirect('manage_manga');
    }

    public function deactivate_manga($id){
        $result=mangas::where('manga_id',$id)->update(array('Status'=>'Inactive'));
            return redirect('manage_manga');
        }

    public function activate_manga($id){
        $result=mangas::where('manga_id',$id)->update(array('Status'=>'Active'));
        return redirect('manage_manga');   
    }



    public function fetch_manga_details($id){
        $result=mangas::where('manga_id',$id)->first();
        return view('edit_manga', compact('result'));
    }

    public function update_manga(Request $req,$id){
        $req->validate([
            'name'=>'required|min:5',
            'writer'=>'required',
            'price'=>'required',
            'stock'=>'required',
            'desc'=>'required',
            'pic' => 'max:1000|mimes:jpg,png,gif,jpeg,webp'

        ],[
          
            'pic.max' => 'Select a file of max 1 MB',
            'pic.mimes' => 'Select jpg or png file to uplaod',
        ]);


        $result=mangas::where('manga_id',$id)->first();
        
        if ($req->hasFile('pic')) {
            $file_name = "Images/manga/" . $result['pic'];
            if (File::exists($file_name)) {
                File::delete($file_name);
            }
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('Images/manga/', $pic_name);
            $result->where('manga_id', $id)->update(array('manga_name' => $req->name, 'price' => $req->price, 'stock' => $req->stock, 'writer' => $req->writer, 'description' => $req->desc, 'pic' => $pic_name));
        
            }else{
                    $result->where('manga_id', $id)->update(array('manga_name' => $req->name, 'price' => $req->price, 'stock' => $req->stock, 'writer' => $req->writer, 'description' => $req->desc));
                }
               return redirect('manage_manga');
    }



    public function search(Request $request)
    {
    if($request->ajax())
    {
    $output="";
    $result=DB::table('mangas')->where('manga_name','LIKE','%'.$request->search."%")->get();
    if($result)
    {
    foreach ($result as $data) {
        if($data->status=="Inactive"){          
            $activete='<a href="'.URL::to('/').'/activate_manga/ '.$data->manga_id.'"><button type="button" class="btn btn-primary">Activate</button></a>
                    ';
        }
        else{
            $activete='<a href="'.URL::to('/').'/deactivate_manga/ '.$data->manga_id.'"><button type="button" class="btn btn-primary">Deactivate</button></a>
            ';
        }
    $output.=
         '<tr class="border-bottom align-self-center text-center">
    
                                        <td><div class="d-flex justify-content-center">
                                            <img src="Images/manga/' .$data->pic. '" class="img mx-2 align-text-center" alt="product" height="120px" width="80px"></div></td>
                                            <td>' .$data->manga_id. '</td>
                                        <td class="text-center"> '. $data->manga_name.'</td>
                                        <td>' .$data->price. '</td>
                                        <td>'. $data->stock.'</td>
                                        <td>'. $data->sell_count.'</td>
                                        <td>' .$data->description. '</td>
                                        <td><a href="edit_manga/'. $data->manga_id.'"><button type="button" class="btn btn-info">Edit</button></a> </td>
                                        <td>'.$activete .' </td>
                                        <td><a href="delete_manga/'. $data->manga_id.'"><button type="button" class="btn btn-danger">Delete</button></a> </td>

                                    </tr>';
    
    }
    return Response($output);
       }
       }
    }

    public function manga(){
        $result=mangas::where('status','Active')->get();
        $popular=mangas::where('status','Active')->orderBy('sell_count','DESC')->limit(4)->get();
        $new=mangas::where('status','Active')->orderBY('release_date','DESC')->limit(4)->get();
        return view('manga_main',compact('popular','new','result'));
    }  


    public function mangaDetails($id){
        $result=mangas::where('manga_id',$id)->get()->first();
        $similar=mangas::where('manga_id','!=',$id)->limit(2)->get();
        $review=DB::table('reviews')
        ->join('mangas', 'reviews.manga_id', '=', 'mangas.manga_id')
        ->join('registered_users', 'reviews.id', '=', 'registered_users.id')
        ->select('registered_users.name','registered_users.pic', 'reviews.rating', 'reviews.review','reviews.date')
        ->get();
        return view('manga_detail',compact('result','similar','review'));
    }
        
    public function add_review(Request $req,$id){

        $req->validate([
            'review'=>'required'
        ],[
            'review.required'=>'Review field cannot be empty'
        ]);

        $result=mangas::where('manga_id',$id)->first();
        $reg=new reviews();
        $reg->id=session()->get('id');
        $reg->product_id=0;
        $reg->product_name="";
        $reg->user=session()->get('name');
        $reg->pic=$result['pic'];
        $reg->email=session()->get('email');
        $reg->rating=$req->rating;
        $reg->review=$req->review;
        $reg->manga_id=$id;
        $reg->manga_name=$result['manga_name'];
        $reg->date=date('Y-m-d');

        $reg->save();
        return redirect()->back();

    }

}
