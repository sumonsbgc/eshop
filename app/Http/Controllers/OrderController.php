<?php

namespace App\Http\Controllers;

use App\Coupon;
use App\Mail\ConfirmationMail;
use App\Mail\Mail;
use App\Order;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class OrderController extends Controller
{
    function storeOrder(Request $request){
        
        
        $current_date = date('ym');

        $generate_num = $current_date. '000';

        $single_data = Order::all();


        if (isset($single_data->last()->receipt_no)){
            $receipt = strval($single_data->last()->receipt_no);


            $receipt_first_four = $receipt[0] . $receipt[1] . $receipt[2] . $receipt[3];

            if ($receipt_first_four != $current_date){
                $receipt_no = $generate_num . 1;
            }
            else{

                $receipt_no = $receipt + 1;
            }
        }else{
            $receipt_no = $generate_num . 1;
        }

        $products_count = count($request->pro_id);

        $product_id = $request->pro_id;
        $product_qty = $request->pro_quantity;
        $product_color = $request->pro_color;

        if (isset($request->pro_size)){
            $product_size = $request->pro_size;
        }


        for ($i =0; $i < $products_count; $i++){

            $request['user_id'] = Auth::user()->id;

            $request['receipt_no'] = $receipt_no;

            $request['product_id'] = $product_id[$i];

            $products_table = Product::where('id',$product_id[$i])->first();

            if ($products_table['product_special_price'] != null){
                $request['product_price'] = $products_table['product_special_price'];
            }else{
                $request['product_price'] = $products_table['product_price'];
            }


            $request['product_color'] = $product_color[$i];
            $request['product_quantity'] = $product_qty[$i];

            if (isset($product_size)){
                $request['product_size'] = $product_size[$i];
            }

            $request['shipping_address'] = $request->address.'; City: '.$request->city.'; State: '.$request->state;

            if ($request['shipping_method'] == 'office_collection'){
                $request['shipping_fee'] = 0;
            }

            $all = $request->except('name','address','state','city','qty','pro_id','pro_quantity','pro_color','pro_size','agree');


            Order::create($all);

            $updates_products=Product::where('id',$product_id[$i])->first();

            $updates_products->product_quantity = $updates_products->product_quantity - $product_qty[$i];

            $updates_products->save();


        }

        Session::forget('return_data');
        Session::forget('sub_total');
        Session::forget('coupon');
        Session::forget('discount_amount');

        return view('FrontEndPage.thankU');

    }

    function orderlist(){
        $all = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*','users.name','products.product_name')
            ->where('orders.status','=','0')
            ->orderBy('orders.created_at','desc')
            ->get();
        $all_in=$all->unique('created_at');



        return view('backEnd.show_order_list',compact('all_in'));
    }
    
    
    function approvelist(){
        $all = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->join('users','orders.user_id','=','users.id')
            ->select('orders.*','users.name','products.product_name')
            ->where('orders.status','=','1')
            ->orderBy('orders.updated_at','desc')
            ->get();
        $all_in=$all->unique('created_at');

        return view('backEnd.approve_order',compact('all_in'));
    }
    
    

    function move_to_sold_product(Request $request){

        $created_date = Order::where('id',$request->order_id)->first()->created_at;

        $all = Order::where('created_at',$created_date)->where('user_id',$request->user_id)->get();

        $usermail = User::where('id',$request->user_id)->first()->email;

        $product_details = DB::table('orders')
            ->join('products','orders.product_id','=','products.id')
            ->select('products.product_name','products.product_price','products.product_special_price','orders.*')
            ->where('orders.created_at','=',$created_date)
            ->where('orders.user_id','=',$request->user_id)
            ->get();

        foreach ($all as $one){

            $one->status = 1;

            $one->save();

        }

        \Illuminate\Support\Facades\Mail::to($usermail)->send(
            new ConfirmationMail($product_details)
        );


    }


    function cancel_order(Request $request){

        $created_date = Order::where('id',$request->order_id)->first()->created_at;

        $all = Order::where('created_at',$created_date)->where('user_id',$request->user_id)->get();

        foreach($all as $one){
            $one->delete();
        }

    }
}
