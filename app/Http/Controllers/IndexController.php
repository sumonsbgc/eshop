<?php



namespace App\Http\Controllers;

use App\BestDeal;
use App\PageAdvertisement;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\featured_items;
use App\Slider;
use App\Brand;
class IndexController extends Controller
{
    public function index()
    {
//        $mainCat = Category::where('categories.parent_status', '=', '0')->get();
//
//        $subs = Category::where('categories.parent_status','>',0)->get();
//
//        $featured_items = DB::table('featured_items')
//            ->join('categories','featured_items.category_id','=','categories.id')
//            ->select('featured_items.*','categories.name AS cat_name')->orderBy('id','desc')->limit(5)->get();
//
//        $brands_items = Brand::all();
//
//        $allSlider = Slider::all();
//
//        $allProducts = DB::table('products')
//            ->join('categories','products.product_category','=','categories.id')
//            ->select('products.*','categories.name AS cat_name')->orderBy('id','desc')->get();
//
//
//
//        $flash_product = DB::table('best_deals')
//            ->join('products','best_deals.product_id','=','products.id')
//            ->join('categories','products.product_category','=','categories.id')
//            ->select('best_deals.*','products.*','categories.name AS cat_name')->get();
//
////        dd($flash_product);
//
//        $Brands = Brand::all();
//
//        $hero_banner = PageAdvertisement::where('area','=','0')->get();
//
//        $mid_banner = PageAdvertisement::where('area','=','1')->get();
//
//        return view('frontEnd/index',
//            compact('mainCat','subs','allProducts','featured_items','allSlider','flash_product','Brands','hero_banner','mid_banner','brands_items'));

        return view('FrontEndPage.index');
    }


    public function addToCart(Request $request, $id){

        $product_color = $request['product_color'];
        $product_size = $request['product_size'];
        $product_quantity = $request['product_quantity'];

        $product_details = Product::where('id','=',$id)->first();


        $product_discount = BestDeal::where('product_id','=',$id)->first();

        $images = explode('|',$product_details->product_images);


        $return_data = [];

        $return_data['product_color'] = $product_color;
        $return_data['product_size'] = $product_size;
        $return_data['product_quantity'] = $product_quantity;
        $return_data['product_name'] = $product_details->product_name;
        $return_data['product_image'] = $images[0];
        $return_data['product_id'] = $id;
        $return_data['product_price'] = $product_details->product_price;
        $return_data['product_special_price'] = $product_details->product_special_price;


        $return_data['product_discount'] = isset($product_discount->product_discount) ? $product_discount->product_discount : null;
        $return_data['start_time'] = isset($product_discount->start_time) ? $product_discount->start_time : null;
        $return_data['end_time'] = isset($product_discount->end_time)? $product_discount->end_time : null;



        if (isset($_COOKIE['sum'])){
            session(['total'=>$_COOKIE['sum']]);
        }

        if (isset($_COOKIE['number'])){
            session(['count'=>$_COOKIE['number']]);
        }


        session()->push('return_data',$return_data);





        return $return_data;


    }
}
