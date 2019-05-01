<?php

namespace App\Http\Controllers;

use App\BestDeal;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BestDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
//        $all_flash_product=BestDeal::all();

        $all_flash_products = DB::table('best_deals')
                ->join('products','best_deals.product_id','=','products.id')
                ->select('best_deals.*','products.product_name','products.product_quantity','products.product_price','products.product_special_price')
                ->get();
                
        $check_last_best_deals = BestDeal::orderBy('id','desc')->limit(6)->get();
                
        return view('backEnd.bestDeals', compact('products','all_flash_products','check_last_best_deals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


        return redirect('admin/bestDeals');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $request['product_id'] = $_POST['product_id'];
        // $request['product_discount'] = $_POST['product_discount'];
        // $request['start_time'] = $_POST['start_time'];
        // $request['end_time']   = $_POST['end_time'];

        $store = $request->all();

        BestDeal::create($store);

//        return "disabled";

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BestDeal  $bestDeal
     * @return \Illuminate\Http\Response
     */
    public function show(BestDeal $bestDeal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BestDeal  $bestDeal
     * @return \Illuminate\Http\Response
     */
    public function edit(BestDeal $bestDeal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BestDeal  $bestDeal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $old= BestDeal::findorfail($id);

        $old->update($request->all());

        return redirect('admin/bestDeals');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BestDeal  $bestDeal
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        BestDeal::find($id)->delete();

        return back();

    }
}
