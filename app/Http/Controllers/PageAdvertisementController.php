<?php

namespace App\Http\Controllers;

use App\PageAdvertisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PageAdvertisementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = PageAdvertisement::all();

        return view('backEnd.PageBanner',compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('PageBanner.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->validate([
            'area'=>'required',
            'target_url'=>'required',
            'images'=>'required'
        ]);

        $upload = $request->file('images');

        $file_name = 'banner_'.time().'.'.$upload->getClientOriginalExtension();

        $path = $upload->storeAs('upload/banner',$file_name);

        PageAdvertisement::create([
            'area'=>$request->area,
            'target_url' => $request->target_url,
            'images'=> $file_name
        ]);

        return redirect('admin/PageBanner');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PageAdvertisement  $pageAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function show(PageAdvertisement $pageAdvertisement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PageAdvertisement  $pageAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function edit(PageAdvertisement $pageAdvertisement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PageAdvertisement  $pageAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $single=PageAdvertisement::find($id);
        $image = $single->images;


        if ($request->file() != null){

            Storage::delete('storage/upload/banner/'.$image);

            $upload = $request->file('images');

            $file_name = 'banner_image_'.time().'.'.$upload->getClientOriginalExtension();

            $path = $upload->storeAs('storage/upload/banner/',$file_name);
            $single->update([
                'area'=>$request->area,
                'target_url'=>$request->target_url,
                'images'=>$file_name
            ]);
        }else{

            $single->update([
                'area'=>$request->area,
                'target_url'=>$request->target_url,
                'images'=>$request->images
            ]);
        }


        return  redirect('admin/PageBanner');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PageAdvertisement  $pageAdvertisement
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single=PageAdvertisement::find($id);
        $image = $single->images;

        Storage::delete('/upload/banner'.$image);

        PageAdvertisement::findorfail($id)->delete();

        return  redirect('admin/PageBanner');
    }
}
