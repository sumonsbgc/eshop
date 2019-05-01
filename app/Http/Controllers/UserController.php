<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showMyAccount(){

        $user = User::where('users.id','=',Auth::user()->id)->first();

        $success_orders = Order::where('user_id',Auth::user()->id)->where('status','1')->orderBy('receipt_no','desc')->get()->unique('receipt_no');

        $pending_orders = Order::where('user_id',Auth::user()->id)->where('status','0')->orderBy('receipt_no','desc')->get()->unique('receipt_no');


        return view('FrontEndPage.my_account',compact('user','pending_orders','success_orders'));

    }

    public function updateMyAccount(Request $request, $id){

        $old = $request->all();

        $new = User::findorfail($id);

        $new->update($old);

        return redirect('/myaccount');

    }


}
