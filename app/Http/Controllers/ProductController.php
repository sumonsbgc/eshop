<?php

namespace App\Http\Controllers;

use App\Product;
use App\Category;
use App\Brand;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $all = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->join('brands','products.product_brand','=','brands.id')
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')->get();


        return view('backEnd/AllProducts', compact('all'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories= Category::where('parent_status', '=', 0)->get();
        $subCategories =  Category::where('parent_status', '=', 1)->get();

        $brands = Brand::all();

        return view('backEnd/AddProduct',compact('categories','brands','subCategories'));
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
            'product_name'=>['required'],
            'product_category'=>['required'],
            'product_quantity'=>['required'],
            'product_model_no'=>['required'],
            'product_code'=>['required'],
            'product_price'=>['required'],
            'product_description'=>['required'],
            'product_images.*.file'=>['mimes: jpeg,png,jpg']
        ]);

        $all = $request->all();

        $sizes = $request['product_size'];

        if ($sizes != null){

            $product_size = [];

            foreach ($sizes as $size){

                $product_size[] = $size;


            }

            $all['product_size'] = implode('|',$product_size);

        }


        $colors = $request['product_color'];

        $p_colors=[];

        foreach ($colors as $color){

            $p_colors[] = $color['product_color'];
        }

        $all['product_color'] = implode('|', $p_colors);


        $images = [];
        if ($files=$request->file('product_images')){

            foreach ($files as $file){

                $name = 'product_image_'.time().'_'.$file->getClientOriginalName();
                $path = $file->storeAs('upload/product_image',$name);
                $images[]=$name;
            }
        }

        $all['product_images'] = implode('|',$images);


        Product::create($all);

        return redirect('admin/product');
    }



    public function changingProductCat($id){

        $subCategories =  Category::where('parent_status', '=', $id)->get();

//        dd($subCategories);




        $html1 =[];
        $html2 =[];

        foreach ($subCategories as $subcategory){

            $html1[] = "<option value='$subcategory->id'>$subcategory->name</option>";

            $brands =  Brand::where('category_id', '=', $subcategory->id)->get();

            foreach ($brands as $brand){

                $html2[] = "<option value='$brand->id'>$brand->name</option>";

            }

        }



//        dd($html2);

        return array($html1,$html2);

    }

    public function changingProductBrands($id){

//        $subCategories =  Category::where('parent_status', '=', $id)->get();

//        dd($subCategories);

        $brands =  Brand::where('category_id', '=', $id)->get();

        $html =[];


        foreach ($brands as $brand){

            $html[] = "<option value='$brand->id'>$brand->name</option>";

        }

//        dd($html2);

        return $html;

    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    public function singleProduct($id){
        $product = DB::table('products')
            ->join('categories','products.product_category','=','categories.id')
            ->join('brands','products.product_brand','=','brands.id')
            ->where('products.id','=',$id)
            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')->first();

//        return $oneProduct;
//        dd($oneProduct);

        return view('backEnd/ShowProduct',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
//        $oneProduct = DB::table('products')
//            ->join('categories','products.product_category','=','categories.id')
//            ->join('brands','products.product_brand','=','brands.id')
//            ->select('products.*','categories.name AS cat_name','brands.name AS brand_name')
//            ->where('products.id','=',$id)
//            ->get();
//
////        dd($oneProduct);
//
//        return view('backEnd/ShowProduct',compact('oneProduct'));

        echo "edit";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $single=Product::find($id);
        $images = explode('|',$single->product_images);


        foreach ($images as $image){

            Storage::delete('upload/product_image/'.$image);

        }



        Product::findorfail($id)->delete();



        return redirect('product');
    }
}
