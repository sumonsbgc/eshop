<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Review;
class ReviewController extends Controller
{

    public function index(){
        $reviews = Review::paginate(10);
        return view('backEnd.reviews', compact('reviews'));
    }

    //
    public function store(Request $request){        
        $valid = Validator::make($request->all(), [
            'review'    => 'required',
            'rating'    => 'required',
        ]);

        if($valid->fails()){
            return back()->withErrors($valid)->withInput();
        }

        $review = new Review;

        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->user_id = $request->user_id;
        $review->product_id = $request->product_id;
        $review->save();
        return back();
    }



}
