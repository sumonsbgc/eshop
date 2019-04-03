<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Product;
use Illuminate\Support\Facades\DB;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allData = Slider::all();

        return view('backEnd.showSliderOptions',compact('allData'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $allData = Slider::all();

        $all = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->join('brands','products.product_brand','=','brands.id')
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')
            ->where('products.product_special_price','!=','null')->get();

        return view('backEnd.Sliders',compact('allData', 'all'));


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
            'caption' => 'required | min:15',
            'discount'=> 'required',
            'image'   => 'required'
        ]);

//        $all = $request->all();

        $upload = $request->file('image');

        $file_name = 'slider_image_'.time().'.'.$upload->getClientOriginalExtension();

        $path = $upload->storeAs('upload/slider',$file_name);

//        $path = $upload->store('upload');
        Slider::create([
            'caption'=>$request->caption,
            'discount' => $request->discount,
            'image'=> $file_name
        ]);

        return redirect('admin/SliderItem');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit(Slider $slider)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $single=Slider::findorfail($id);
        $image = $single->image;

        if ($request->file() != null){

            Storage::delete('upload/slider/'.$image);

            $upload = $request->file('image');


            $file_name = 'slider_image_'.time().'.'.$upload->getClientOriginalExtension();

            $path = $upload->storeAs('upload/slider',$file_name);

            $single->update([
                'caption'=>$request->caption,
                'discount'=>$request->discount,
                'image'=>$file_name
            ]);
        }else{

            $single->update([
                'caption'=>$request->caption,
                'discount'=>$request->discount,
                'image'=>$request->img_name
            ]);
        }


        return redirect('admin/SliderItem');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::findorfail($id)->delete();

        return redirect('admin/SliderItem');
    }


    public function Inserting_slider($id){

        $all = Product::where('id','=',$id)->first();

        if ($all->product_special_price != null){

        $caption = $all->product_name;
        $diff = $all->product_price - $all->product_special_price;

        $a = $diff / $all->product_price;

        $discount = floor($a * 100);

        $images = explode('|',$all->product_images);

        $image = $images[0];

        Slider::Create([
            'product_id' =>$id,
            'caption'=>$caption,
            'discount' => $discount,
            'image'=> $image
        ]);

        return "Added";


        }else{
            false;
        }

    }
}
