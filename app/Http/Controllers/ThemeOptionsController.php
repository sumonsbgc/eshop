<?php

namespace App\Http\Controllers;

use App\ThemeOptions;
use Illuminate\Http\Request;

class ThemeOptionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all = ThemeOptions::get();
        $all = $all->last();
        return view('backEnd.themeOptions', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $all = $request->all();

        if ($request->hasFile('logo') && $request['logo'] != null) {
            $file = $request->file('logo');
            $file_name = rand(1000, 9999) . $file->getClientOriginalName();
            $file->move("themeoption", $file_name);
        }


        if ($request['shipping_charge'][0]['amount'] != null ){
            $all['shipping_charge'] = serialize($request->shipping_charge);
        }
        else{
            $all['shipping_charge'] = null;
        }

        $all['logo'] = isset($file_name) ? $file_name : null;

        ThemeOptions::create($all);

        return back()->with('msg','');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ThemeOptions $themeOptions
     * @return \Illuminate\Http\Response
     */
    public function show(ThemeOptions $themeOptions)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ThemeOptions $themeOptions
     * @return \Illuminate\Http\Response
     */
    public function edit(ThemeOptions $themeOptions)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\ThemeOptions $themeOptions
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ThemeOptions $themeOptions)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ThemeOptions $themeOptions
     * @return \Illuminate\Http\Response
     */
    public function destroy(ThemeOptions $themeOptions)
    {
        //
    }
}
