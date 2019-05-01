<?php

namespace App\Http\Controllers;

use App\Order;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class Reports extends Controller
{
    public function default_report(Request $request){


        $total_product_purchase_amount = DB::table('products')
            ->select(DB::raw('product_quantity * product_retail_price as total_product_amount'))
            ->get()
            ->sum('total_product_amount');


        $total_product_purchase_count = Product::all()->sum('product_quantity');

        $total_sell_product_amount = Order::where('status','1')->get()->unique('receipt_no')->sum('total_payment');

        $total_sell_product_count = Order::where('status','1')->get()->sum('product_quantity');

        $expense = $total_sell_product_amount - $total_product_purchase_amount;

        if ($expense > 0){
            $profit = abs($expense);
            $loss = 0;
        }else{
            $profit = 0;
            $loss = abs($expense);
        }



        $all_purchase = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->leftjoin('brands','products.product_brand','=','brands.id')
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')->get();


        $all_sell = Order::where('status','1')->get()->unique('receipt_no');



        if ($request->from !=null && $request->to !=null){
            $request_to = date("Y-m-d", strtotime($request->to.'+ 1 day'));
            $from = date("Y-m-d", strtotime($request->from));


            $total_product_purchase_amount = DB::table('products')
                ->select(DB::raw('product_quantity * product_retail_price as total_product_amount'))
                ->whereBetween('created_at',[$from,$request_to])
                ->get()
                ->sum('total_product_amount');


            $total_product_purchase_count = Product::all()->whereBetween('created_at',[$from,$request_to])->sum('product_quantity');

            $total_sell_product_amount = Order::where('status','1')->whereBetween('updated_at',[$from,$request_to])->get()->unique('receipt_no')->sum('total_payment');

            $total_sell_product_count = Order::where('status','1')->whereBetween('updated_at',[$from,$request_to])->get()->sum('product_quantity');

            $expense = $total_sell_product_amount - $total_product_purchase_amount;

            if ($expense > 0){
                $profit = abs($expense);
                $loss = 0;
            }else{
                $profit = 0;
                $loss = abs($expense);
            }

            $all_purchase = DB::table('products')
                ->join('categories','products.product_category','=','categories.id')
                ->leftjoin('brands','products.product_brand','=','brands.id')
                ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')
                ->whereBetween('products.created_at',[$from,$request_to])
                ->get();


            $all_sell = Order::where('status','1')->whereBetween('updated_at',[$from,$request_to])->get()->unique('receipt_no');


        }
        elseif ($request->filter !=null){

            $days = today()->subDays($request->filter - 1);

            $total_product_purchase_amount = DB::table('products')
                ->select(DB::raw('product_quantity * product_retail_price as total_product_amount'))
                ->where('created_at','>=',$days)
                ->get()
                ->sum('total_product_amount');


            $total_product_purchase_count = Product::where('created_at','>=',$days)->sum('product_quantity');

            $total_sell_product_amount = Order::where('status','1')->where('updated_at','>=',$days)->get()->unique('receipt_no')->sum('total_payment');

            $total_sell_product_count = Order::where('status','1')->where('updated_at','>=',$days)->get()->sum('product_quantity');

            $expense = $total_sell_product_amount - $total_product_purchase_amount;

            if ($expense > 0){
                $profit = abs($expense);
                $loss = 0;
            }else{
                $profit = 0;
                $loss = abs($expense);
            }

            $all_purchase = DB::table('products')
                ->join('categories','products.product_category','=','categories.id')
                ->leftjoin('brands','products.product_brand','=','brands.id')
                ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')
                ->where('products.created_at','>=',$days)
                ->get();

            $all_sell = Order::where('status','1')->where('updated_at','>=',$days)->get()->unique('receipt_no');

        }




        return view('backEnd.reports', compact('total_sell_product_count','total_sell_product_amount','total_product_purchase_count','total_product_purchase_amount','profit','loss','all_purchase','all_sell'));
    }
}
