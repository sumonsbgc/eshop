<?php
use App\Category;
use App\Post;
use App\Navigation;

if(!function_exists('getCategoryName')){
  function getCategoryName($cat){
    return Category::find($cat)->name;
  }
}


if(!function_exists('getParentCategories')){
  function getParentCategories(){
    return Category::where('parent_status', 0)->get();
  }
}

if(!function_exists('getChildCategories')){
  function getChildCategories($status){
    return Category::where('parent_status', $status)->get();
  }
}


if(!function_exists('getAllPostCategories')){
  function getAllPostCategories(){
    return Category::where(['post_type' => 'post'])->get();
  }
}


if(!function_exists('getAllTrashPosts')){
  function getAllTrashPosts(){
    return Post::onlyTrashed(['post_type' => 'post'])->get();
  }
}


if (!function_exists('get_customer_order')){
    function get_customer_order($time,$user_id){

        $products =\Illuminate\Support\Facades\DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->where('orders.created_at','=',$time)
            ->where('orders.user_id','=',$user_id)
            ->select('orders.*','products.product_name','products.product_price')
            ->get();

        return $products;
    }
}

if (!function_exists('get_category_name')){
    function get_category_name($cat_id){
        $cat = Category::where('id',$cat_id)->first();
        return $cat;
    }
}

if (!function_exists('get_the_pages')){
  function get_the_pages($id){
      $page = Post::where(['id'=> $id, 'post_status' => 'publish', 'post_type' => 'page'])->first();
      return $page;
  }
}

if (!function_exists('get_the_menu_name')){
  function get_the_menu_name($menu_name){
      $menu = Navigation::where(['menu_name' => $menu_name, 'menu_status' => 'publish'])->first();
      return $menu;
  }
}

