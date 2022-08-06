<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Sub_category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->get();
        // return  $posts;
        // return view('backend.post.index', compact('posts'));
        return view('backend.post.index',compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $subcategories = Sub_category::all();
        return view('backend.post.create',compact('categories','subcategories'));

        // return redirect()->route('backend.post.index');

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

            'title'            => 'required',
            'meta_title'       => 'required',
            'description'      => 'required',
            'meta_description' => 'required',

            'date'             => 'required',
            // 'image'            => 'required',
        ], [
            'title.required'            => 'Please enter your title',
            'meta_title.required'       => 'Please enter your meta_title',
            'description.required'      => 'Please enter your description',
            'meta_description.required' => 'Please enter your meta_description',
            'date.required'             => 'Please enter the date',

        ]);


        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('photos', $imageName, 'public');

            Post::create([
                'title'            => $request->title,
                'meta_title'       => $request->meta_title,
                'description'      => $request->description,
                'meta_description' => $request->meta_description,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'date'             => $request->date,
                'image'            => $imageName,
            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');

        } else{

            Post::create([
                'title'            => $request->title,
                'meta_title'       => $request->meta_title,
                'description'      => $request->description,
                'meta_description' => $request->meta_description,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'date'             => $request->date,

            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');

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
        $post= Post::findOrFail($id);

        return view('backend.post.edit', compact('post'));
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
        $request->validate([

            'title'            => 'required',
            'meta_title'       => 'required',
            'description'      => 'required',
            'meta_description' => 'required',
            'date'             => 'required',
        ], [
            'title.required'            => 'Please enter your title',
            'meta_title.required'       => 'Please enter your meta_title',
            'description.required'      => 'Please enter your description',
            'meta_description.required' => 'Please enter your meta_description',
            'date.required'             => 'Please enter the date',
        ]);


        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('photos', $imageName, 'public');

             Post:: findOrFail($id)->update([
                'title'            => $request->title,
                'meta_title'       => $request->meta_title,
                'description'      => $request->description,
                'meta_description' => $request->meta_description,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'date'             => $request->date,
                'image'            => $imageName,
            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');

        } else{

            Post:: findOrFail($id)->update([
                'title'            => $request->title,
                'meta_title'       => $request->meta_title,
                'description'      => $request->description,
                'meta_description' => $request->meta_description,
                'category_id'      => $request->category_id,
                'sub_category_id'  => $request->sub_category_id,
                'date'             => $request->date,

            ]);
            return Redirect()->route('post.index')->with('success','post Inserted');

        }

        // Post:: findOrFail($id)->update([
        //     'title'  => $request->title,
        //     'category_id' => $request->category_id,
        //     'sub_category_id' => $request->sub_category_id,
        //     'date'=> $request -> date,
        //     'image'=> $request -> image,
        //    ]);

        //    return "ok";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
