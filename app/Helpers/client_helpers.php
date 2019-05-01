<?php
use App\User;
use App\Product;
use App\Brand;
use App\Category;
use App\Review;

if (!function_exists('set_sql_mode')) {
    /**
     * @param string $mode
     * @return bool
     */
    function set_sql_mode($mode = '')
    {
        return \Illuminate\Support\Facades\DB::statement("SET SQL_MODE=''");
    }
}

if (!function_exists('get_best_seller')){
    function get_best_seller($p_id){
        $data = Product::where('id',$p_id)->first();
        return $data;
    }
}

if (!function_exists('get_products')){
    function get_products($args,$limit){
        if (!isset($limit)){
            $limit = 6;
        }
        $products= Product::where('product_category',$args)->orderBy('id','desc')->limit($limit)->get();

        if($products->isNotEmpty()){
            return $products;
        }else{
            return null;
        }
    }
}

if (!function_exists('get_sub_cat')){
    function get_sub_cat($parent_status){
        $sub_cats = Category::where('parent_status',$parent_status)->where('post_type','product')->get();

        return $sub_cats;
    }
}


if(!function_exists('get_products_by_cat_id')){
    function get_products_by_cat_id($args){
        $products= Product::where('product_category',$args)->orderBy('id','desc')->get();

        if($products->isNotEmpty()){            
            return $products;
        }else{
            return null;
        }
    }
}

if(!function_exists('get_reviews_by_product_id')){
    function get_reviews_by_product_id($id){

        $reviews = Review::where(['product_id' => $id])->get();

        if($reviews->isNotEmpty()){            
            return $reviews;
        }else{
            return null;
        }

    }
}

if(!function_exists('getUserInfo')){
    function getUserInfo($id){        
        $user = User::where(['id' => $id])->first();
        if($user !== null){
            return $user->toArray();
        }else{
            return null;
        }

    }
}


if (!function_exists('get_user_wishlist')){
    function get_user_wishlist($user_id){
        $products = \Illuminate\Support\Facades\DB::table('wishlists')
            ->join('products','wishlists.product_id','=','products.id')
            ->select('products.product_name','products.product_price','products.product_special_price','products.product_quantity','wishlists.*')
            ->where('wishlists.user_id','=',$user_id)
            ->get();

        return $products;
    }
}


if (!function_exists('get_receipt_no')){

    function get_receipt_no($user_id){

        $id = \App\Order::where('user_id',$user_id)->get();
        $receipt = $id->last()->receipt_no;

        return $receipt;

    }

}

if (!function_exists('get_order_items')){
    function get_order_items($receipt_no){
        $a =  \Illuminate\Support\Facades\DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->select('products.product_name','orders.*')
            ->where('orders.receipt_no','=',$receipt_no)
            ->get();

        return $a;
    }
}


if (!function_exists('get_report_details')){
    function get_report_details($receipt_no){
        $quantity = \App\Order::where('receipt_no',$receipt_no)->where('status','1')->get()->sum('product_quantity');
        return $quantity;
    }
}



