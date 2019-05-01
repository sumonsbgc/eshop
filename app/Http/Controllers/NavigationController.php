<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Category;
use App\Navigation;
use Response;
use Session;

class NavigationController extends Controller
{

    public function index(){

        $pages = Post::where(['post_type' => 'page', 'post_status' => 'publish'])->get();
        $menus = Navigation::distinct('menu_name')->get();
        return view('backEnd.menu', compact('pages', 'menus'));
    }

    public function store(Request $request){
        if($request->isMethod('post')){            
                        
            if($request->menu_type == "page"){
                // return $request->page_id;
                if( !is_null($request->menu_name) && isset($request->menu_name) ){
                    $page = [];
                    foreach($request->page_id as $id){
                        $page[] = Post::find($id);
                    }
                    // Session::push("menus", $page);
                    return Response::json($page);
                }else{
                    return Response::json(["result" => null]);
                }
            }

            if($request->menu_type == "category"){
                if( !is_null($request->menu_name) && isset($request->menu_name) ){
                    $cat = [];
                    foreach($request->cat_id as $id){
                        $cat[] = Category::find($id);
                    }
                    // Session::push("menus", $cat);
                    return Response::json($cat);
                }else{
                    return Response::json(["result" => null]);
                }
            }
        }
    }

    public function create_menu(Request $request){
        
        // dd($request->all());

        if($request->isMethod('post')){
            // $menu = new Navigation;
            if(Navigation::where(['menu_name' => $request->menu_name])->count() === 1){
                Navigation::where(['menu_name' => $request->menu_name])->update(array(
                    'menu_name' => $request->menu_name,
                    'menu_slug' => strtolower(str_replace(' ', '_', $request->menu_name)),
                    'menu_status' => 'publish',
                    'ids' => '',
                    'page_id' => serialize($request->page_id),
                    'cat_id' => serialize($request->cat_id),
                    'li_classes' => serialize($request->li_classes),
                    'description' => serialize($request->description),                    
                    'isNewTab' => serialize($request->isNewTab),
                ));
            }else{
                Navigation::create([
                    'menu_name' => $request->menu_name,
                    'menu_slug' => strtolower(str_replace(' ', '_', $request->menu_name)),
                ]);
            }
            
            Session::put('menu_name', $request->menu_name);
            return back();
        }
    }

    public function menu_change(Request $request){
        if($request->isMethod('post')){
            Session::put('menu_name', $request->menu_name);
            return back();
        }
    }
}
