<?php

namespace App\Http\Controllers;

use App\Admin;
use Illuminate\Http\Request;

use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        $this->middleware('auth:admin');
    }




    public function index()
    {
        return view('backEnd.index');
    }



    /**

     * Where to redirect users after login.

     *

     * @var string

     */

//    protected $redirectTo = '/home';
//
//
//
//    /**
//
//     * Create a new controller instance.
//
//     *
//
//     * @return void
//
//     */
//
//    public function __construct()
//
//    {
//
//        $this->middleware('guest')->except('logout');
//
//    }
//
//
//
//    public function showLoginForm()
//
//    {
//
//        return view('auth.adminLogin');
//
//    }
//
//
//
//    public function login(Request $request)
//
//    {
//
//        if (auth()->guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {
//
//            dd(auth()->guard('admin')->user());
//
//        }
//
//
//
//        return back()->withErrors(['email' => 'Email or password are wrong.']);
//
//    }
}
