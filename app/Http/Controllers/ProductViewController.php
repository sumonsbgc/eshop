<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\DB;

class ProductViewController extends Controller
{
    public function SingleProductView($id){

        $product = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->leftjoin('brands','products.product_brand','=','brands.id')
            ->where('products.id','=',$id)
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')->first();
        
        set_sql_mode('');
        $best_sellers = DB::table('orders')
            ->select('product_id',DB::raw('count(product_id) as counting'))
            ->where('status','=','1')
            ->groupBy('product_id')
            ->get()
            ->sortByDesc('counting')
            ->take(5);


        return view('FrontEndPage.single',compact('product', 'best_sellers'));
    }


    public function CategoriesProduct($id){

        $category_name = Category::where('id','=',$id)->first();

        $categories = Product::where('product_category','=',$id)->get();

        $Brands = Brand::where('category_id','=',$id)->get();

        return view('frontEnd.cateogries',compact('categories','category_name','Brands'));

    }
}
