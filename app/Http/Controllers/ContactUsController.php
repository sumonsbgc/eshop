<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Validator;

class ContactUsController extends Controller
{
    //
    public function index(){

    }

    public function create(){
        return view('FrontEndPage.contact-us');
    }

    public function store(Request $request){
        if($request->isMethod('post')){
            $validation = [
                'fname' => 'required',
                'email' => 'required',
                'mobile' => 'required',
                'message' => 'required'
            ];

            $validator = Validator::make($request->all(), $validation);

            if($validator->fails()){
                return back()->withErrors($validator)->withInput();
            }
                        
            $email = "sumonsbgc@gmail.com";
            Mail::send('Mail.contact', array(
                'name' => $request->fname,
                'email' => $request->email,
                'mobile' => $request->mobile,
                'user_message' => $request->message,
            ),function($message) use ($request, $email) {
                $message->from($request->email);
                $message->to($email, 'Admin')->subject('Query For Contact');
            });

            return back()->with('success','Your Mail Has Been Send Successfully.');
        }
    }
}
