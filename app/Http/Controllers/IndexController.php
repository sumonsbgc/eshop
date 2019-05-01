<?php
namespace App\Http\Controllers;

use App\BestDeal;
use App\Coupon;
use App\PageAdvertisement;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\featured_items;
use App\Slider;
use App\Slider_image;
use App\Brand;
use Illuminate\Support\Facades\Session;
use Validator;
use App\EmailSubscribe;
use Auth;
class IndexController extends Controller
{
    public function index()
    {
        $mainCat = Category::where('categories.parent_status', '=', '0')->where('post_type', 'product')->get();
        //
        //        $subs = Category::where('categories.parent_status','>',0)->get();
        //
        //        $featured_items = DB::table('featured_items')
        //            ->join('categories','featured_items.category_id','=','categories.id')
        //            ->select('featured_items.*','categories.name AS cat_name')->orderBy('id','desc')->limit(5)->get();
        //
        //        $brands_items = Brand::all();
        //
        $allSlider = Slider_image::orderBy('id', 'desc')->limit(6)->get();
        //
        //        $allProducts = DB::table('products')
        //            ->join('categories','products.product_category','=','categories.id')
        //            ->select('products.*','categories.name AS cat_name')->orderBy('id','desc')->get();
        //
        //
        //
        $flash_products = DB::table('best_deals')
            ->join('products', 'best_deals.product_id', '=', 'products.id')
            ->join('categories', 'products.product_category', '=', 'categories.id')
            ->select('best_deals.id as serial', 'best_deals.product_id', 'best_deals.product_discount', 'products.*', 'categories.name AS cat_name')->orderBy('serial', 'desc')->limit(5)->get();
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
        return view('FrontEndPage.index', compact('mainCat', 'allSlider', 'flash_products'));
    }


    public function addToCart(Request $request, $id)
    {

        $product_color = $request['product_color'];

        if (isset($request['product_size'])) {
            $product_size = $request['product_size'];
        } else {
            $product_size = null;
        }
        $product_quantity = $request['product_quantity'];

        $product_details = Product::where('id', '=', $id)->first();


        //$product_discount = BestDeal::where('product_id','=',$id)->first();

        $images = explode('|', $product_details->product_images);


        $return_data = [];

        $return_data['product_color'] = $product_color;
        $return_data['product_size'] = $product_size;
        $return_data['product_quantity'] = $product_quantity;
        $return_data['product_name'] = $product_details->product_name;
        $return_data['product_image'] = $images[0];
        $return_data['product_id'] = $id;

        if ($product_details->product_special_price != null) {
            $return_data['product_price'] = $product_details->product_special_price;
        } else {
            $return_data['product_price'] = $product_details->product_price;
        }


        //        if (isset($_COOKIE['sum'])){
        //            session(['sum'=>$_COOKIE['sum']]);
        //        }
        //
        //        if (isset($_COOKIE['quantity'])){
        //            session(['quantity'=>$_COOKIE['quantity']]);
        //        }

        session()->push('return_data', $return_data);
        return $return_data;
    }

    public function productSearch(Request $request)
    {
        $products = Product::where('product_name', 'LIKE', "%{$request->key}%")->paginate(20);
        return view('FrontEndPage.categories', compact('products'));
    }

    public function getCategories()
    {
        $products = Product::paginate(20);
        return view('FrontEndPage.categories', compact('products'));
    }

    public function getCategory($cat = null)
    {
        if (null === $cat) {
            return ['status' => 'No Data is available to this category'];
        }

        $cats = Category::where('name', $cat)->first();        
        if(null !== $cats){
            $products = Product::where(['product_category' => $cats->id])->paginate(20);
        }else{
            return view('FrontEndPage.category')->with('status', 'Sorry There is no products avaiable to this category');
        }
        return view('FrontEndPage.category', compact('products'));
    }

    function remove_cart($id)
    {
        $all = Session::get('return_data');
        foreach ($all as $index => $item) {
            if ($index == $id) {
                unset($all[$index]);
                $new = array_values($all);
                Session::put('return_data', $new);
                return 'remove data';
            }
        }
    }
    
    function update_cart_qty(Request $request,$id){

        $all = Session::get('return_data');

        foreach ($all as $indx=>$value){

            if ($indx == $id){
                $all[$indx]['product_quantity'] = $request['product_quantity'];
                \session()->put('return_data',$all);
            }

        }

    }
    
    function buynow(Request $request, $id){
        $product_color = $request['product_color'];

        if (isset($request['product_size'])){
            $product_size = $request['product_size'];
        }else{
            $product_size = null;
        }
        $product_quantity = $request['product_quantity'];

        $product_details = Product::where('id','=',$id)->first();

        $images = explode('|',$product_details->product_images);


        $return_data = [];

        $return_data['product_color'] = $product_color;
        $return_data['product_size'] = $product_size;
        $return_data['product_quantity'] = $product_quantity;
        $return_data['product_name'] = $product_details->product_name;
        $return_data['product_image'] = $images[0];
        $return_data['product_id'] = $id;

        if ($product_details->product_special_price != null){
            $return_data['product_price'] = $product_details->product_special_price;
        }
        else{
            $return_data['product_price'] = $product_details->product_price;
        }


        session()->push('return_data',$return_data);


        return $return_data;
    }
    
    
    
    function apply_coupon(Request $request,$coupon){

        $coupons = Coupon::where('coupon',$coupon)->first();

        $date = date('Y-m-d');


        if ($coupons['percent_discount'] != null){
            $session_data = Session::get('return_data');
            foreach ($session_data as $subarray){
                if ($subarray['product_id'] == $coupons['product_id']){

                    if ($coupons['expire_date'] >= $date){
                        $amount = ($subarray['product_price'] * $coupons['percent_discount']) / 100 ;
                        return $amount;
                    }else{
                        return 0;
                    }

                }
            }
        }
        elseif ($coupons['fixed_product_discount'] != null){
            $session_data = Session::get('return_data');
            foreach ($session_data as $subarray){
                if ($subarray['product_id'] == $coupons['product_id']){
                    if ($coupons['expire_date'] <= $date){
                        $amount = $coupons['fixed_product_discount'] ;
                        return $amount;
                    }else{
                        return 0;
                    }
                }
            }

        }

        elseif ($coupons['fixed_cart_discount'] != null){
            if ($request->total >= $coupons['fixed_cart_discount'] && $coupons['expire_date'] >= $date){
                return $coupons['fixed_cart_discount'];
            }else{
                return 0;
            }
        }
        else{
            return 0;
        }


    }

    function subscribe_mail(Request $request){
        if($request->isMethod("POST")){
            $valid = Validator::make($request->all(), [
                'subscribe_mail' => 'required|unique:email_subscribes'
            ]);

            if($valid->fails()){
                return back()->with(['subscribe' => false]);
            }

            $subscribe = new EmailSubscribe;
            
            if(Auth::check()){
                $subscribe->user_id = Auth::id;
            }

            $subscribe->subscribe_mail = $request->subscribe_mail;
            $subscribe->save();

            return back()->with(['subscribe' => true]);
        }
    }
}
