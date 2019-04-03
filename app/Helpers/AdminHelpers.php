<?php
use App\Category;

if(!function_exists('getCategoryName')){
  function getCategoryName($cat){
    return Category::find($cat)->name;
  }
}

if(!function_exists('getAllPostCategories')){
  function getAllPostCategories(){
    return Category::where(['post_type' => 'post'])->get();
  }
}

