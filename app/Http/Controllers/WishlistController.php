<?php

namespace App\Http\Controllers;

use App\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist_add(Request $request){


        $request['user_id'] = Auth::user()->id;

        $all = $request->all();

        Wishlist::create($all);

    }

    public function wishlist_remove($id){

        Wishlist::findorfail($id)->delete();

    }
}
