<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function showMyAccount(){

        $user = User::where('users.id','=',Auth::user()->id)->first();

        return view('FrontEndPage.my_account',compact('user'));

    }

    public function updateMyAccount(Request $request, $id){

        $old = $request->all();

        $new = User::findorfail($id);

        $new->update($old);

        return redirect('/myaccount');

    }


}
