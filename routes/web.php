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


//Route::get('/',function (){
//   return view('frontEnd/index');
//});

Route::get('/','IndexController@index');

Route::get('/category',function (){
    return view('FrontEndPage.category');
});
Route::get('/single',function (){
    return view('FrontEndPage.single');
});

Route::get('/cartpage',function (){
   return view('FrontEndPage.cart');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');


//Route::get('/singleProduct/{id}','ProductViewController@SingleProductView')->name('singleProductView');
//Route::get('/categories/{id}','ProductViewController@CategoriesProduct')->name('CategoryProductView');
//
Route::get('/myaccount','UserController@showMyAccount')->name('myAccount')->middleware('verified');
Route::post('/myaccount/{id}','UserController@updateMyAccount')->name('myAccountUpdate')->middleware('verified');

//
//Route::get('/addToCart/{id}','IndexController@addToCart');

Route::get('admin/login','Auth\AdminLogin@showLoginForm')->name('adminLogin');
Route::post('admin/login','Auth\AdminLogin@login')->name('acceptedAdmin');


Route::group(['prefix'=>'admin', 'middleware'=>['auth:admin']],function (){

    Route::post('logout/','Auth\AdminLogin@logout')->name('AdminLogout');

    Route::get('/','AdminController@index')->name('adminIndex');

    Route::resource('/posts', 'PostController');
    Route::resource('/pages', 'PageController');
    Route::resource('/categories', 'CategoryController');
    Route::resource('/brands','BrandController');
    Route::resource('/product','ProductController');

    Route::post('/chaining_product/{id}','ProductController@changingProductCat');

    Route::post('/chaining_brand/{id}','ProductController@changingProductBrands');

    Route::resource('/featuredItems','FeaturedItemsController');

    Route::resource('/bestDeals','BestDealController');

    Route::post('/bestDeals/store','BestDealController@store');

    Route::resource('/SliderItem','SliderController');

    Route::resource('/PageBanner','PageAdvertisementController');

    Route::post('/inserting_slider/{id}','SliderController@Inserting_slider');

    Route::get('/single_product/{id}','ProductController@singleProduct')->name('singleProduct');

});



