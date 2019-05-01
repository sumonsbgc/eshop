<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/','IndexController@index');

//Route::get('/',function (){
//   return view('frontEnd/index');
//});

Route::get('/categories', 'IndexController@getCategories');
Route::get('/category/{cat}', 'IndexController@getCategory');

// Route::get('/single',function (){
//     return view('FrontEndPage.single');
// });

Route::get('/cartpage',function (){
   return view('FrontEndPage.cart');
});

Route::get('/checkout',function (){
    return view('FrontEndPage.checkout');
})->middleware(['auth','return_data']);


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');

Route::get('/singleProduct/{id}','ProductViewController@SingleProductView')->name('singleProductView');
//Route::get('/categories/{id}','ProductViewController@CategoriesProduct')->name('CategoryProductView');
//

Route::post('/store_order','OrderController@storeOrder')->name('store_order')->middleware('auth');

Route::get('/myaccount','UserController@showMyAccount')->name('myAccount')->middleware('auth');
Route::post('/myaccount/{id}','UserController@updateMyAccount')->name('myAccountUpdate')->middleware('verified');

//
Route::post('/addwishlist','WishlistController@wishlist_add')->middleware('auth');
Route::get('/remove_wishlist/{id}','WishlistController@wishlist_remove')->middleware('auth');
Route::get('/addToCart/{id}','IndexController@addToCart');
Route::get('/removeCart/{id}','IndexController@remove_cart');
Route::get('/updateCart/{id}','IndexController@update_cart_qty');
Route::get('/buynow/{id}','IndexController@buynow');
Route::get('/thanku',function (){
   return view('FrontEndPage.thankU');
});

Route::get('/apply_coupon/{coupon}','IndexController@apply_coupon');
Route::get('admin/login','Auth\AdminLogin@showLoginForm')->name('adminLogin');
Route::post('admin/login','Auth\AdminLogin@login')->name('acceptedAdmin');

Route::post('/cancel_order','OrderController@cancel_order');
Route::post('/order_shipping','OrderController@move_to_sold_product');


Route::group(['prefix'=>'admin', 'middleware'=>['auth:admin']],function (){
    Route::post('logout/','Auth\AdminLogin@logout')->name('AdminLogout');
    Route::get('/','AdminController@index')->name('adminIndex');
    Route::resource('/posts', 'PostController');

    Route::get('posts/comments', function(){
        return view('backEnd.comments');
    })->name('posts.comments');

    Route::resource('/pages', 'PageController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/brands','BrandController');
    Route::resource('/product','ProductController');
    Route::get('reviews', 'ReviewController@index');
    
    Route::get('/coupon','CouponController@coupon_form');
    Route::post('/coupon','CouponController@generate_coupon')->name('add_coupon');
    Route::delete('/delete_coupon/{id}','CouponController@delete_coupon')->name('delete_coupon');
    Route::get('/menus', 'NavigationController@index');
    Route::post('/menu', 'NavigationController@store');
    Route::post('/change_menu', 'NavigationController@menu_change');
    Route::post('/create_menu', 'NavigationController@create_menu');
    Route::get('/sold_product','ProductController@soldProduct');
    Route::get('/orderlist','OrderController@orderlist');
    Route::get('/approvelist','OrderController@approvelist');
    Route::post('/chaining_product/{id}','ProductController@changingProductCat');
    Route::post('/chaining_brand/{id}','ProductController@changingProductBrands');
    Route::resource('/featuredItems','FeaturedItemsController');
    Route::resource('/bestDeals','BestDealController');
    Route::post('/bestDeals/store','BestDealController@store');
    Route::resource('/SliderItem','SliderController');
    Route::post('/store_slider','SliderController@storeSlider')->name('store_slider');
    Route::resource('/PageBanner','PageAdvertisementController');
    Route::post('/inserting_slider/{id}','SliderController@Inserting_slider');
    Route::get('/single_product/{id}','ProductController@singleProduct')->name('singleProduct');

    Route::resource('themeOptions','ThemeOptionsController');
    
    Route::post('/reports','Reports@default_report')->name('reports');
    Route::get('/reports','Reports@default_report');
});

Route::get('/search/results', 'IndexController@productSearch')->name('search');
Route::post('review', 'ReviewController@store');

// Route::get('{page}', function($slug){
//     $page = \App\Post::where(['post_name' => $slug, 'post_type' => 'page'])->first();    
//     if(view()->exists("FrontEndPage/{$page->post_name}")){
//         return view('/FrontEndPage/{$page->post_name }', compact('page'));
//     }
//     return view('page', compact('page'));
// });

Route::post('email_subscribe', 'IndexController@subscribe_mail');
Route::get('lang/{locale}', 'LocalizationController@index');
Route::get('contact-us', 'ContactUsController@create');
Route::post('contact', 'ContactUsController@store')->name('contactcreate');
Route::get('{page}', 'PageController@show');
