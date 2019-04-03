<?php

use App\Product;
use App\Brand;
use App\Category;

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