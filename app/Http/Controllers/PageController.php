<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Validator;
use App\Category;
use App\Post;
use Auth;

class PageController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::where(['post_status' => 'publish', 'post_type' => 'page'])->get();
        return view('backEnd.page_lists', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::where(['post_type' => 'page'])->get();
        return view('backEnd.page_create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        if($request->isMethod('post')){
            $validation = [
                'title' => 'required|unique:posts',
                'sub_title' => 'unique:posts|nullable',
                'content' => 'nullable',
                'post_thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,bmp,gif',
                'post_category' => 'required',
                'parent_post' => 'nullable',
                'post_status'  => 'required',
            ];
            $validator = Validator::make($request->all(), $validation);

            if($validator->fails()){
                return redirect()->route('pages.create')->withErrors($validator)->withInput();
            }


            if($request->hasFile('post_thumbnail')){
                $file = $request->file('post_thumbnail');
                if(in_array(strtolower($file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp', 'gif'])){
                    if($file->getClientSize() < 2000000 ){
                        $thumbnail = str_replace(' ', '', rand(2, time()).$file->getClientOriginalName());
                        $file->move('storage/upload/pages/', $thumbnail);
                    }else{
                        return back()->with(['status' => 'Sorry Your File Size is exceded 2 megabyte.Please Upload the file within 2 megabyte size.'])->withInput();
                    }
                }else{
                    return back()->with(['status' => 'Sorry Your File Extension is invalid'])->withInput();
                }
            }

            $post = new Post;
            $post->title = $request->title;
            $post->content = isset($request->content) ? $request->content : '';
            $post->sub_title = isset($request->sub_title) ? $request->sub_title : '';
            $post->post_thumbnail = isset($thumbnail) ? $thumbnail : '';
            $post->author_id = Auth::user()->id;
            $post->post_status = isset($request->post_status) ? $request->post_status : '';
            $post->post_name = strtolower(str_replace(' ', '-',  $request->title));
            $post->post_type = isset($request->post_type) ? $request->post_type : '';
            $post->parent_post = isset($request->parent_post) ? $request->parent_post : '';
            $post->post_category = isset($request->post_category) ? $request->post_category : '';
            $post->save();
            
            return back()->with(['status' => 'Post Created Successfully']);
        }else{
            return back()->with(['status' => 'Sorry You Have No Access!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $post = Post::where(['post_type' => 'post', 'post_status' => 'publish', 'id' => $id ]);
        $post = Post::findOrFail($id);
        return view('backEnd.page_edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if($request->isMethod('PUT')){
            $validation = [
                'title' => 'required',
                'sub_title' => 'nullable',
                'content' => 'nullable',
                'post_thumbnail' => 'nullable|image|mimes:jpeg,jpg,png,bmp,gif',
                'post_category' => 'required',
                'parent_post' => 'nullable',
                'post_status'  => 'required',
            ];        
            $validator = Validator::make($request->all(), $validation);
            if($validator->fails()){
                return redirect()->route('pages.create')->withErrors($validator)->withInput();
            }
    
            if($request->hasFile('post_thumbnail')){
                $file = $request->file('post_thumbnail');
                if(in_array(strtolower($file->getClientOriginalExtension()), ['jpg', 'jpeg', 'png', 'bmp', 'gif'])){
                    if($file->getClientSize() < 2000000 ){
                        $prevThumb = Post::find($id)->post_thumbnail;

                        if(isset($prevThumb) && $prevThumb !== ""){
                            // @unlink(public_path("storage/upload/posts/".$prevThumb));
                            \File::delete("storage/upload/posts/".$prevThumb);
                        }

                        $thumbnail = str_replace(' ', '', rand(2, time()).$file->getClientOriginalName());
                        $file->move('storage/upload/posts/', $thumbnail);

                    }else{
                        return back()->with(['status' => 'Sorry Your File Size is exceded 2 megabyte.Please Upload the file within 2 megabyte size.'])->withInput();
                    }
                }else{
                    return back()->with(['status' => 'Sorry Your File Extension is invalid'])->withInput();
                }
            }
    
            $post = Post::find($id);
            
            $post->title = $request->title;
            $post->content = isset($request->content) ? $request->content : '';
            $post->sub_title = isset($request->sub_title) ? $request->sub_title : '';
            $post->post_thumbnail = isset($thumbnail) ? $thumbnail : '';
            $post->author_id = Auth::user()->id;
            $post->post_status = isset($request->post_status) ? $request->post_status : '';
            $post->post_name = strtolower(str_replace(' ', '-',  $request->title));
            $post->post_type = isset($request->post_type) ? $request->post_type : '';
            $post->parent_post = isset($request->parent_post) ? $request->parent_post : '';
            $post->post_category = isset($request->post_category) ? $request->post_category : '';

            $post->save();
            return back()->with(['status' => 'Post Updated Successfully']);
        }else{
            return back()->with(['status' => 'Sorry You Have No Access!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return back()->with('status', 'Successfully Deleted Your Item.');
    }
}
