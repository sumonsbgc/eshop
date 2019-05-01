<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    use SoftDeletes;

    protected $guarded = [];
    public function admin(){
        return $this->belongsTo('App\User', 'admins_id');
    }
    
    
    // public static function findBySlug($slug){
    //     return new Post([
    //             'title' => Str::title(str_replace('-', ' ', $slug)),
    //             'content' => 'Lorem Ipsum Dolor The Demo Content',
    //             'post_name' => $slug,
    //             'post_type' => 'page'
    //         ]);
    //         return new Post();
    // }
}
