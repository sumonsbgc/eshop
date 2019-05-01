<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponController extends Controller
{
    function coupon_form(){

        $all = Product::where('product_quantity','>',0)->get();

//        $allCoupon = Coupon::all();

        $allCoupon =DB::table('coupons')
            ->leftjoin('products','coupons.product_id','=','products.id')
            ->select('coupons.*','products.product_name')
            ->get();


        return view('backEnd.coupon',compact('all','allCoupon'));

    }

    function generate_coupon(Request $request){
        
        $request->validate([
            'coupon'=>'required|unique:coupons',
            'expire_date'=>'required'
        ]);

        $all = $request->all();

        Coupon::create($all);

        return redirect('/admin/coupon');
    }


    function delete_coupon($id){


        Coupon::findorfail($id)->delete();

        return redirect('/admin/coupon');

    }


}
