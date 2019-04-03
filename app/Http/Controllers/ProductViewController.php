<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\DB;

class ProductViewController extends Controller
{
    public function SingleProductView($id){

        $product = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->join('brands','products.product_brand','=','brands.id')
            ->where('products.id','=',$id)
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')->first();

        return view('frontEnd.singleProduct',compact('product'));

    }


    public function CategoriesProduct($id){

        $category_name = Category::where('id','=',$id)->first();

        $categories = Product::where('product_category','=',$id)->get();

        $Brands = Brand::where('category_id','=',$id)->get();

        return view('frontEnd.cateogries',compact('categories','category_name','Brands'));

    }
}
