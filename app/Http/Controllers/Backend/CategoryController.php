<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function __construct()
    {
      $this->middleware('auth');
    }

    public function index(){
        $categories = Category::all();
        // return $categories;
        return view('backend.category.index',compact('categories'));
    }
    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'          => 'required',
            'description'   => 'required',
        ], [
            'name.required'        => 'Please enter the name',
            'description.required' => 'Description is required',
        ]);
        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            $request->image->storeAs('photos', $imageName, 'public');

           Category::create([
                'name'        => $request->name,
                'slug'        => Str::slug($request->name, '-'),
                'description' => $request->description,
                'image'       => $imageName,
            ]);
            return Redirect()->route('category.index')->with('success','category Inserted');
        } else{
            Category::create([
                'name'        => $request->name,
                'slug'        => Str::slug($request->slug, '-'),
                'description' => $request->description,
            ]);
            return Redirect()->route('category.index')->with('success','category Inserted');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // return $category ;
        return view('backend.category.edit', compact('category'));
    }
    public function update(Request $request, $id)
    {

        // return $request->all();

        $request->validate([
            'name'                 => 'required',
            'description'          => 'required',
        ], [
            'name.required'        => 'Please enter the name',
            'description.required' => 'Description is required',

        ]);
        if ($request->hasFile('image')) {

            $imageName = $request->image->getClientOriginalName();
            if($imageName != null){
                $category = Category::findOrFail($id);
                Storage::disk('public')->delete('photos/' . $category->image);
            }
            $request->image->storeAs('photos', $imageName, 'public');

            Category::findOrFail($id)->update([
                'name'        => $request->name,
                'slug'        => Str::slug($request->name, '-'),
                'description' => $request->description,
                'image'       => $imageName,
            ]);


            return Redirect()->route('category.index')->with('success', 'Category Inserted');
        } else {

            Category::findOrFail($id)->update([
                'name'        => $request->name,
                'slug'        => Str::slug($request->name, '-'),
                'description' => $request->description,
            ]);
            return Redirect()->route('category.index')->with('success', 'Category Inserted');
        }
    }
    public function destroy($id)
    {
        Category::findOrFail($id)->delete();
        return redirect()->back()->with('delete', 'Successfully Data delete');
    }
}
