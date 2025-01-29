<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user;
use App\Http\Controllers\product;
use App\Http\Controllers\orders;
use App\Http\Controllers\manga;
use App\Models\order;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('register','register_user')->middleware('logged_in');
Route::view('login','login')->middleware('logged_in');
// Route::view('footer','footer');
// Route::view('header2','user_header');
Route::view('test','test');
Route::view('master_view','master_view');
Route::view('home','home_page');
Route::get('home',[product::class,'home']);

Route::view('about_us','about_us');


//other 
Route::view('Mail_Message','Mail_Message');


// Route::post('send_mail',[data::class,'send_email']);

Route::post('add_user',[user::class,'register_user']);
Route::post('login_action',[user::class,'login_action']);
Route::get('activate_user/{email}',[user::class,'activate_user']);


Route::post('send_request',[user::class,'send_request']);

Route::get('logout',[user::class,'logout']);


Route::view('forget_password_form', 'forget_password_form');
Route::post('forgot_password',[user::class,'forgot_password']);
Route::get('verify_forget_pwd_otp/{email}/{token}', [user::class, 'verify_forget_pwd_otp']);
Route::post('verify_otp_forget_password_action', [user::class, 'verify_otp_forget_password_action']);
Route::post('reset_pwd_action', [user::class, 'reset_pwd_action']);


Route::view('invoice','PDF/invoice');
Route::view('generate','PDF/report');


// orders
// Route::post('checkout_action',[orders::class,'checkout_action']);

Route::get('/', function () {
    return redirect('home');
});

Route::view('manga','manga_main');
Route::get('manga',[manga::class,'manga']);
Route::view('search_products','search_product');
Route::get('search_products',[product::class,'searchAllProducts']);


Route::middleware(['user'])->group(function () {
  
Route::view('product_detail','product_detail_page');
Route::view('cart','product_cart');
Route::view('checkout','checkout');
Route::view('user_profile_view','user_profile');
Route::view('admin_dashboard','admin_dashboard');
Route::view('manage_users','manage_users');
Route::view('manage_reviews','manage_reviews');
Route::view('manage_products','manage_products');
Route::view('manage_manga','manage_manga');
Route::view('manage_orders','manage_orders');
Route::view('manage_stock','manage_stock');
Route::view('edit_user','edit_user');
Route::view('edit_product','edit_product');
Route::view('change_profile','change_profile');
Route::view('add_product','add_product');
Route::view('add_manga','add_manga');
Route::view('add_users','add_user');
Route::view('manage_user_request','manage_user_request');




// user
Route::get('user_profile',[user::class,'get_userDetails']);
Route::get('edit_user/{id}',[user::class,'fecth_user_details']);
Route::post('update_profile',[user::class,'change_profile']);
Route::get('change_profile',[user::class,'get_profile']);
Route::post('update_user/{id}',[user::class,'update_user']);
Route::get('generate_bill/{id}',[user::class,'generate_bill']);
// Route::get('change_password',[user::class,'fetch_password']);

//Admin
Route::get('manage_users',[user::class,'showAllUser']);
Route::get('deactivate_user/{email}',[user::class,'deactivate_user']);
Route::get('delete_user/{id}',[user::class,'delete_user']);
Route::get('search',[user::class,'search']);
Route::get('admin_dashboard',[user::class,'admin_dashboard']);
Route::get('generate_report',[user::class,'generate_report']);




//User requests
Route::get('manage_user_request',[user::class,'showAllRequest']);
Route::get('answer_request/{id}',[user::class,'answer_request']);
Route::get('pending_request/{id}',[user::class,'pending_request']);
Route::get('delete_request/{id}',[user::class,'delete_request']);
Route::get('search_request',[user::class,'search_request']);

//Products 
Route::post('insert_product',[product::class,'add_product']);
Route::get('manage_products',[product::class,'showAllProducts']);
Route::get('delete_product/{id}',[product::class,'delete_product']);
Route::get('deactivate_product/{id}',[product::class,'deactivate_product']);
Route::get('activate_product/{id}',[product::class,'activate_product']);
Route::get('search_product',[product::class,'search']);
Route::get('edit_product/{id}',[product::class,'fetch_product_details']);
Route::post('update_product/{id}',[product::class,'update_product']);
Route::get('category/{category}',[product::class,'category_search']);

// Sort
Route::get('sort_product',[product::class,'sort']);



//Manga
Route::get('manage_manga',[manga::class,'showAllMangas']);
Route::post('insert_manga',[manga::class,'add_manga']);
Route::get('delete_manga/{id}',[manga::class,'delete_manga']);
Route::get('deactivate_manga/{id}',[manga::class,'deactivate_manga']);
Route::get('activate_manga/{id}',[manga::class,'activate_manga']);
Route::get('search_manga',[manga::class,'search']);
Route::get('edit_manga/{id}',[manga::class,'fetch_manga_details']);
Route::post('update_manga/{id}',[manga::class,'update_manga']);

//Home


//Manga

// Product Detail
Route::get('product_detail/{id}/{category}',[product::class,'productDetails']);
Route::post('add_review/{id}',[product::class,'add_review']);

Route::get('manga_detail/{id}',[manga::class,'mangaDetails']);
Route::post('add_manga_review/{id}',[manga::class,'add_review']);


Route::get('manage_reviews',[product::class,'showAllReviews']);
Route::get('delete_review/{id}',[product::class,'delete_review']);
Route::get('search_review',[product::class,'search_review']);


// Cart
Route::get('add_product_cart/{id}',[orders::class,'add_product_cart']);
Route::get('add_manga_cart/{id}',[orders::class,'add_manga_cart']);

Route::get('delete_product_cart/{id}',[orders::class,'delete_product_cart']);
Route::get('increase_quantity/{id}',[orders::class,'increase_quantity']);
Route::get('decrease_quantity/{id}',[orders::class,'decrease_quantity']);

Route::get('cart',[orders::class,'showCartItems']);


// Orders
Route::get('checkout/{id}',[orders::class,'checkout']);
Route::get('manage_orders',[orders::class,'getAllOrders']);

Route::get('delete_order/{id}',[orders::class,'delete_order']);
Route::get('delivered/{id}',[orders::class,'delivered']);
Route::get('pending/{id}',[orders::class,'pending']);
Route::get('search_order',[orders::class,'search_order']);

Route::post('checkout_action',[orders::class,'checkout_action']);


Route::view('order_details','order_details');
});
