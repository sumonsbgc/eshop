<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Category;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */




    public function index()
    {
        $categories= Category::where('parent_status', '=', 0)->get();
        $subCategories =  Category::where('parent_status', '=', 1)->get();

        $all = Brand::all();

        return view('backEnd/brands',compact('all','categories','subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('admin/brands');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'category_id'=>'required',
            'name'=>'required',
            'image'=>'required'
        ]);


        $upload = $request->file('image');

        $file_name = 'brand_image_'.time().'.'.$upload->getClientOriginalExtension();

        $path = $upload->storeAs('upload/brands',$file_name);

//        $path = $upload->store('upload');
        Brand::create([
            'category_id'=>$request->category_id,
            'name' => $request->name,
            'image'=> $file_name
        ]);

        return redirect('admin/brands');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $single=Brand::findorfail($id);
        $image = $single->image;


        if ($request->file() != null){

            Storage::delete('upload/brands/'.$image);

            $upload = $request->file('image');


            $upload = $request->file('image');


            $file_name = 'brand_image_'.time().'.'.$upload->getClientOriginalExtension();

            $path = $upload->storeAs('upload/brands/',$file_name);
            $single->update([
                'name'=>$request->name,
                'image'=>$file_name
            ]);
        }else{

            $single->update([
                'name'=>$request->name,
                'image'=>$request->img_name
            ]);
        }


        return redirect('admin/brands');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single=Brand::find($id);
        $image = $single->image;

        Storage::delete('upload/'.$image);

        Brand::findorfail($id)->delete();



        return redirect('admin/brands');
    }


}
