<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
class LocalizationController extends Controller
{
    //
    public function index(Request $request, $locale){
        Session::put('locale', $locale);
        return redirect('/');
    }
    
    
}
