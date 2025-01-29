<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use App\Models\registered_users;
use App\Models\user_request;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Exception;
use Carbon\Carbon;
use App\Models\DeleteToken;
use App\Models\mangas;
use App\Models\products;
use App\Models\order;
use Barryvdh\DomPDF\Facade\Pdf;
use Rmunate\Utilities\SpellNumber;

class user extends Controller
{
    public function register_user(Request $req){
        $req->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|email',
            'mobile'=>'required|digits:10',
            'pwd'=>'|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',
            'pwd_confirmation'=>'required',
            'dob'=>'required',
            'address'=>'required',
            'pin'=>'required'

        ],[
            'fullname.required' => 'Full name cannot be empty',
            'fullname.min' => 'Full name must contain minimum 3 characters',
            'email.required' => 'Email address canniot be empty',
            'email.email' => 'Invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'pwd_confirmation.required' => 'Confirm Password must not be empty',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
        ]);

        $user = new registered_users(); 
        $user->name=$req->fullname;
        $user->email=$req->email;
        $user->mobile=$req->mobile;
        $user->dob=$req->dob;
        $user->gender=$req->gen;
        $user->address=$req->address;
        $user->pincode=$req->pin;
        $user->pwd=$req->pwd;
        $user->save();

        $this->send_email($req);
        
        if(session()->get('role')=="Admin"){
            return redirect('add_user');
        }
        else{
        return view('Mail_Message');
        }
    }


    public function send_email($req){
        $em=$req->email;
        $name=$req->fullname;
        $data=['email'=> $em,'name'=> $name];
        Mail::send("activation_link",['data1'=>$data],function($message)use($data){
            $message->to($data['email'],$data['name']);
            $message->from("redronin106@gmail.com","Red Ronin");
        });

       
    }


    public function delete_user($id){
        DB::delete('delete from registered_users where id = ?',[$id]);

            return redirect('manage_users');
    }


    public function deactivate_user($email){
        $result=registered_users::where('email',$email)->update(array('Status'=>'Inactive'));
        // if($result){
        //     return "Activated";
        // }

        if(session()->get('role')=="Admin"){
            return redirect('manage_users');
        }
        
        if(session()->get('role')=="normal"){
            return redirect('login');
        }
    }

    public function activate_user($email){
        $result=registered_users::where('email',$email)->update(array('Status'=>'Active'));
        if(session()->get('role')=="Admin"){
            return redirect('manage_users');
        }
    
        if(session()->get('role')=="normal"){
            return redirect('login');
        }else{
            session()->flash('login_err', 'Your account is already active please login first');
            return redirect('login');
        }    
    }




    public function login_action(Request $req){
        $req->validate([
           'email'=>'required',
           'pwd'=>'required' 
        ]);

        $data = registered_users::where('email',$req->email)->where('pwd',$req->pwd)->first(); 

        if($data==null){
          session()->flash('login_err', 'Invalid Email or password');
          return redirect()->to('login');

        }else{
            
            if($data['status']=="Inactive"){
                session()->flash('login_err', 'Your account is not active Activate your account');
                return redirect()->to('login');
            }else{
            $req->session()->put('id',$data['id']);
            $req->session()->put('name',$data['name']);
            $req->session()->put('email',$data['email']);
            $req->session()->put('pwd',$data['pwd']);
            $req->session()->put('role',$data['role']);
            if($data['role']=='Admin'){
                return redirect('admin_dashboard');
            }else{
            return redirect('/');
            }
            }
        }

    }

    public function logout(){
            
            session()->remove('email');
            session()->remove('pwd');
            session()->remove('role');
            return redirect('login');
        

    }

    // public function forgot_password(Request $req){

    //     $entry =array(); 
    //     $entry['email']=$req->email;
    //     $result=DB::table('registered_users')->where('email',$req->email)->first();
    //     $entry['token']= $result->pwd;
    //     $entry['created_at']=date("Y-m-d H:i:s");
    //     $data=['email'=> $entry['email'],'token'=> $entry['token']];

    //     DB::table('password_reset_tokens')->insert($entry);
    //     Mail::send("forgot_password_mail",['data1'=>$data],function($message)use($data){
    //         $message->to($data['email'],"User");
    //         $message->from("redronin106@gmail.com","Red Ronin");
    //     });

    //     session()->flash('succ',"Check your mail");
    //     return redirect('login');
       
    // }


    // public function forget_password_form_submit(Request $req)
    public function forgot_password(Request $req)
    {
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $rules = ['email' => 'required|email'];
        $errors = [
            'email.required' => 'Email addrss is a required field',
            'email.email' => 'Enter a valid email address'
        ];
        $req->validate($rules, $errors);
        $em = $req->email;
        $data = registered_users::where('email', $em)->first();
        if ($data) {
            $data1 = DeleteToken::where('email', $em)->first();
            if ($data1) {
                session()->flash('warning', 'A Password reset link is already sent to your mail please check. New link will be generated after old link expires');
            } else {
                date_default_timezone_set("Asia/Kolkata");
                $s_time = date("Y-m-d G:i:s");

                $token = hash('sha512', $s_time);
                $otp = mt_rand(100000, 999999);
                $data2 = array('name' => $data->name, 'email' => $em, 'token' => $token, 'otp' => $otp);
                try {
                    // Mail::send(['text' => 'mail_forget_pwd'], ["data3" => $data2], function ($message) use ($data2) {
                    //     $message->to($data2['email'], $data2['name'])->subject('Account Activation Link');
                    //     $message->from('janki.kansagra@rku.ac.in', 'Janki Kansagra');
                    // });

                    Mail::send("forgot_password_mail",['data3'=>$data2],function($message)use($data2){
                        // $message->to($data2['email'],"User");
                        $message->to($data2['email'], $data2['name'])->subject('Account Activation Link');
                        $message->from("redronin106@gmail.com","Red Ronin");
                    });

                } catch (Exception $ex) {
                    session()->flash('login_err', 'We encountered some error in sending the password reset token');
                    return redirect('forget_password_form');
                }
                $expiry_time = Carbon::now()->addMinutes(30);
                $token_ins = new DeleteToken();
                $token_ins->email = $em;
                $token_ins->otp = $otp;
                $token_ins->token = $token;
                $token_ins->expiry_time = $expiry_time;
                if ($token_ins->save()) {
                    session()->flash('succ', 'Password reset tokens sent to your registered email address');
                }
            }
        } else {
            session()->flash('login_err', 'Sorry the email address you entered is not registered.');
        }
        return redirect('forget_password_form');
    }

    public function verify_forget_pwd_otp($email, $token)
    {
        date_default_timezone_set("Asia/Kolkata");
        session()->put('forget_pwd_email', $email);
        session()->put('forget_pwd_token', $token);
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data1 = DeleteToken::where('email', $email)->first();
        if ($data1) {
            return view('verify_otp_forget_pwd');
        } else {
            session()->flash('login_err', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function verify_otp_forget_password_action(Request $req)
    {

        $req->validate(['otp' => 'required|size:6'], ['otp.required' => 'OTP cannot be empty', 'otp.size' => 'OTP must have 6 digits only']);
        $otp = $req->otp;
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            if ($data->otp == $otp) {
                return view('reset_pwd');
            } else {
                session()->flash('error', 'Incorrect OTP');
                return view('verify_otp_forget_pwd');
            }
        } else {
            session()->flash('login_err', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }

    public function reset_pwd_action(Request $req)
    {
        $rules = [
            'npwd' => 'required|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/|confirmed',
            'npwd_confirmation' => 'required',
        ];
        $errors = [
            'npwd.required' => 'Password field cannot be empty',
            'npwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'npwd.confirmed' => 'Password and Confirm Password must match',
            'npwd_confirmation.required' => 'Confirm Password must not be empty'
        ];
        $req->validate($rules, $errors);
        if (session('forget_pwd_token') && session('forget_pwd_email')) {
            $email = session()->get('forget_pwd_email');
            $token = session()->get('forget_pwd_token');
        }
        date_default_timezone_set("Asia/Kolkata");
        $current_time = Carbon::now();
        DeleteToken::where('expiry_time', '<', $current_time)->delete();
        $data = DeleteToken::where('email', $email)->where('token', $token)->first();
        if ($data) {
            $data1 = registered_users::where('email', $email)->update(array('pwd' => $req->npwd));
            if ($data1) {
                DeleteToken::where('email', $email)->delete();
                session()->flash('succ', 'Password changed successfully');
                return redirect('forget_password_form');
            }
        } else {
            session()->flash('login_err', 'Password reset token expired. Please Generate the link again by submitting the form');
            return redirect('forget_password_form');
        }
    }




    public function get_userDetails(){

        $result=registered_users::where('email',session()->get('email'))->first();

        $order=DB::table('orders')->where('email',session()->get('email'))->get();
        


        $count=DB::table('orders')->where('email',session()->get('email'))->count();
        return view('user_profile', compact('result','order','count'));
    }





    public function fecth_user_details($id){
        $result=registered_users::where('id',$id)->first();
        return view('edit_user', compact('result'));
    }

    public function update_user(Request $req,$id){
        $req->validate([
            'fullname'=>'min:5',
            'email'=>'email',
            'mobile'=>'digits:10',
            'pwd'=>'|confirmed|regex:/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$%^&*-]).{8,20}$/',

        ],[
          
            'fullname.min' => 'Full name must contain minimum 3 characters',
            'email.email' => 'Invalid email address',
            'pwd.required' => 'Password field cannot be empty',
            'pwd.regex' => 'Password must contain one small letter one capital letter, one number and one special symbol',
            'pwd.confirmed' => 'Password and Confirm Password must match',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
        ]);

        $result=registered_users::where('id',$id)->first();

        $result->where('id', $id)->update(array('name' => $req->fullname, 'pwd' => $req->pwd, 'mobile' => $req->mobile, 'gender' => $req->gender, 'dob' => $req->dob, 'address' => $req->address, 'pincode' =>$req->pin));

        return redirect('user_profile');

    }



    public function get_profile(){
        $result=registered_users::where('email',session()->get('email'))->first();
        return view('change_profile', compact('result'));
    }


    public function change_profile(Request $req){
        $req->validate([
            'pic' => 'required|max:512'
        ],[
            'pic.required' => 'Please select a file to uplaod',
            'pic.max' => 'Select a file of max 500 KB',
        ]);

        $result=registered_users::where('email',session()->get('email'))->first();
            $pic_name = uniqid() . $req->file('pic')->getClientOriginalName();
            $req->pic->move('Images/profile/', $pic_name);
            $result->where('email', session()->get('email'))->update(array('pic' => $pic_name));


            return $this->get_profile($result->id);

    }




    public function showAllUser(){
        $result=registered_users::paginate(10);  
        $count=DB::table('registered_users')->get()->count();

        return view('manage_users',compact('result','count'));
    }


    public function showAllRequest(){
        $result=user_request::paginate(10);  
        $count=DB::table('user_requests')->get()->count();
        return view('manage_user_request',compact('result','count'));
    }

    public function send_request(Request $req){
        $req->validate([
            'fullname'=>'required|min:5',
            'email'=>'required|email',
            'mobile'=>'required|digits:10',
            'message1'=>'required'

        ],[
            'fullname.required' => 'Full name cannot be empty',
            'fullname.min' => 'Full name must contain minimum 3 characters',
            'email.required' => 'Email address canniot be empty',
            'email.email' => 'Invalid email address',
            'mobile.required' => 'Mobile number cannot be empty',
            'mobile.digits' => 'Mobile number must conatin only 10 digits',
        ]);

        $reg=new user_request();
        $reg->name=$req->fullname;
        $reg->email=$req->email;
        $reg->mobile=$req->mobile;
        $reg->message=$req->message1;
        $reg->date=date('Y-m-d');
        
        if($reg->save()){
            session()->flash('succ','Message sent successfully');
        }else{
            session()->flash('err','Message not sent');
        }
        return redirect('about_us');
    }


    public function delete_request($id){
        DB::delete('delete from user_requests where request_id = ?',[$id]);
            return redirect('manage_user_request');
    }

    public function answer_request($id){
        $result=user_request::where('request_id',$id)->update(array('Status'=>'Answered'));
            return redirect('manage_user_request');
        }

    public function pending_request($id){
        $result=user_request::where('request_id',$id)->update(array('Status'=>'Pending'));
        return redirect('manage_user_request');   
    }



    
public function search(Request $request)
{
if($request->ajax())
{
$output="";
$result=DB::table('registered_users')->where('name','LIKE','%'.$request->search."%")->get();
if($result)
{
foreach ($result as $data) {
    if($data->status=="Inactive"){
        $activete='<a href="'.URL::to('/').'/activate_user/ '.$data->email.'"><button type="button" class="btn btn-primary">Activate</button></a>
        ';
    }
    else{
        $activete='<a href="'.URL::to('/').'/deactivate_user/ '.$data->email.'"><button type="button" class="btn btn-primary">Deactivate</button></a>
        ';
    }
$output.=
     '<tr class="border-bottom align-self-center text-center">

                                    <td><div class="d-flex justify-content-center">
                                        <img src="Images/profile/' .$data->pic. '" class="img mx-2 align-text-center review-profile" alt="profile" height="40px" width="40px"></div></td>
                                    <td class="text-center"> '. $data->name.'</td>
                                    <td>' .$data->email. '</td>
                                    <td>'. $data->mobile.'</td>
                                    <td>'. $data->gender.'</td>
                                    <td>'.$activete .' </td>
                                    <td><a href="delete_user/'. $data->id.' "><button type="button" class="btn btn-danger">Delete</button></a> </td>
                                
                                </tr>';

}
return Response($output);
   }
   }
}


public function search_request(Request $request)
{
if($request->ajax())
{
$output="";
$result=DB::table('user_requests')->where('name','LIKE','%'.$request->search."%")->get();
if($result)
{
foreach ($result as $data) {
    if($data->status=="Pending"){
        $activete='<a href="'.URL::to('/').'/answer_request/ '.$data->request_id.'"><button type="button" class="btn btn-primary">Answer</button></a>
        ';
    }
    else{
        $activete='<a href="'.URL::to('/').'/pending_request/ '.$data->request_id.'"><button type="button" class="btn btn-primary">Pending</button></a>
        ';
    }
$output.=
     '<tr class="border-bottom align-self-center text-center">

                                    <td class="text-center"> '. $data->name.'</td>
                                    <td>' .$data->email. '</td>
                                    <td>'. $data->mobile.'</td>
                                    <td>'. $data->message.'</td>
                                    <td>'. $data->status.'</td>
                                    <td>'.$activete .' </td>
                                    <td><a href="delete_request/'. $data->request_id.' "><button type="button" class="btn btn-danger">Delete</button></a> </td>
                                
                                </tr>';

}
return Response($output);
   }
   }
}


// Admin Dashboard

    public function admin_dashboard(){

        $review=DB::table('reviews')
        ->join('registered_users', 'reviews.id', '=', 'registered_users.id')
        ->select('reviews.user','registered_users.pic', 'reviews.rating', 'reviews.review','reviews.date')
        ->limit(4)->get();
        $product=DB::table('products')->orderBy('sell_count','DESC')->limit(4)->get();
        $manga=DB::table('mangas')->orderBy('sell_count','DESC')->limit(4)->get();
        $countReviews=DB::table('reviews')->get()->count();
        $countMangas=DB::table('mangas')->get()->sum('sell_count');
        $countProducts=DB::table('products')->get()->sum('sell_count');
        $stock=DB::table('products')->get()->sum('stock');
        $mangaStock=DB::table('mangas')->get()->sum('stock');
        $stock=$stock+$mangaStock;
        $order=DB::table('orders')->orderByDesc('date')->limit(4)->get();
        return view('admin_dashboard',compact('review','countReviews','countMangas','countProducts','manga','product','stock','order'));
    }


    public function generate_report(){
        $product=DB::table('products')->orderBy('sell_count','DESC')->first();
        $manga=DB::table('mangas')->orderBy('sell_count','DESC')->first();

        $product_count=order::whereBetween('date', 
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::today()])->get()->sum('quantity');
        $manga_count=order::whereBetween('date', 
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::today()])->get()->sum('quantity');
        
        $product_stock=products::get()->sum('stock');
        $manga_stock=mangas::get()->sum('stock');

        $stock=$product_stock+$manga_stock;

        $earnings=DB::table('orders')->whereBetween('date', 
        [Carbon::now()->subMonth()->startOfMonth(), Carbon::today()])->get()->sum('amount');
    
        $data=[
            'product'=>$product,
            'manga'=>$manga,
            'product_sell'=>$product_count,
            'manga_sell'=>$manga_count,
            'stock'=>$stock,
            'earning'=>$earnings,
            'date'=>date('d-m-Y')

        ];

        $pdf=PDF::loadview('PDF/report',['data'=>$data])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('report.pdf');
    }

    public function generate_bill($id){

        $order=DB::table('orders')->where('order_id',$id)->first();
        $pdf=PDF::loadview('PDF/invoice',['order'=>$order])->setOptions(['defaultFont' => 'sans-serif']);
            return $pdf->download('invoice.pdf');
    }
}



