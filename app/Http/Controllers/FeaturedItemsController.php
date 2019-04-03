<?php

namespace App\Http\Controllers;

use App\featured_items;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\DB;
use Symfony\Component\Console\Helper\Table;

class FeaturedItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::where('categories.parent_status','>=',0)->get();

        $items = DB::table('featured_items')
            ->join('categories','featured_items.category_id','=','categories.id')
            ->select('featured_items.*','categories.name AS cat_name')->orderBy('id','desc')->get();
//        dd($items);

        return view('backEnd.featured_items',compact('items','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return redirect('admin/featuredItems');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

//        dd($request);
        $all = $request->all();

        featured_items::create($all);

        return redirect('admin/featuredItems');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\featured_items  $featured_items
     * @return \Illuminate\Http\Response
     */
    public function show(featured_items $featured_items)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\featured_items  $featured_items
     * @return \Illuminate\Http\Response
     */
    public function edit(featured_items $featured_items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\featured_items  $featured_items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $old = featured_items::findorfail($id);

        $old->update($data);

        return redirect('admin/featuredItems');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\featured_items  $featured_items
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        featured_items::findorfail($id)->delete();

        return redirect('admin/featuredItems');
    }
}
