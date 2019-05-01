<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

//    protected $fillable= ['product_name','product_category','product_brand','product_quantity','product_model_no','product_code','product_color','product_price','product_special_price','product_description', 'product_images','product_status'];

    protected $guarded=[];

    public function review(){
        $this->hasMany('App\Review');
    }
    

}
