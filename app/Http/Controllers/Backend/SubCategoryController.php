<?php

namespace App\Http\Controllers\Backend;
use App\Models\Sub_category;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){

        $sub_categories = Sub_category::with('category')->latest()->get();
        // return $sub_categories;
        return view('backend.sub_category.index',compact('sub_categories'));
    }

    public function create()
    {
        $categories = Category::all();
        // return  $category;
        return view('backend.sub_category.create',compact('categories'));
    }

    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'sub_category_name' => 'required',
            'description'       => 'required',
        ], [
            'sub_category_name'    => 'Please enter the name',
            'description.required' => 'Description is required',
        ]);

        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('photos', $imageName, 'public');

           Sub_category::create([
                'category_id'       => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_slug' => Str::slug($request->sub_category_name, '-'),
                'description'       => $request->description,
                'image'             => $imageName,
            ]);
            return Redirect()->route('sub_category.index')->with('success','Sub_Category Inserted');
        } else{
            Sub_category::create([
                'category_id'       => $request->category_id,
                'sub_category_name' => $request->sub_category_name,
                'sub_category_slug' => Str::slug($request->sub_category_name, '-'),
                'description'       => $request->description,
            ]);
            return Redirect()->route('sub_category.index')->with('success','Sub_Category Inserted');
        }
    }

    public function edit($id)
    {
        $sub_category = Sub_category::findOrFail($id);
        // return $category ;
        $categories = Category::all();
        return view('backend.sub_category.edit', compact('sub_category','categories'));
    }
    public function update(Request $request, $id)
    {

        // return $request->all();

        $request->validate([
            'category_id'       => 'required',
            'sub_category_name' => 'required',
            'description'       => 'required',
        ], [
            'category_id.required'       => 'Please enter the category name',
            'sub_category_name.required' => 'Please enter the sub-category name',
            'description.required'       => 'Description is required',

        ]);
        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('photos', $imageName, 'public');

            Sub_category::findOrFail($id)->update([
                'sub_category_name' => $request->sub_category_name,
                'sub_category_slug' => Str::slug($request->sub_category_slug, '-'),
                'description'       => $request->description,
                'image'             => $imageName,
            ]);


            return Redirect()->route('sub_category.index')->with('success', 'Sub_category Inserted');
        } else {

            Sub_category::findOrFail($id)->update([
                'sub_category_name' => $request->sub_category_name,
                'sub_category_slug' => Str::slug($request->sub_category_slug, '-'),
                'description'       => $request->description,
            ]);
            return Redirect()->route('sub_category.index')->with('success', 'Sub_category Inserted');
        }
    }
    public function destroy($id)
    {
        Sub_category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }

}
