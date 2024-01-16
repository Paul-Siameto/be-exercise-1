<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data=Category::all();
        return view('backend.category.index',['data'=>$data,
        'title'=>'All Category',
        'meta_desc'=>'This is meta description for all categories'
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.category.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
        }else{
            $reImage='NA';
        }

        $category=new Category;
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/create')->with('success', 'Data has been added');

    }

   
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data=Category::find($id);
        return view('backend.category.update',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title'=>'required',
            'detail'=>'required'
        ]);

        if($request->hasFile('cat_image')){
            $image=$request->file('cat_image');
            $reImage=time().'.'.$image->getClientOriginalExtension();
            $dest=public_path('/imgs');
            $image->move($dest,$reImage);
    }else{
        $reImage=$request->cat_image;
    }

        $category=Category::find($id);
        $category->title=$request->title;
        $category->detail=$request->detail;
        $category->image=$reImage;
        $category->save();

        return redirect('admin/category/'.$id.'/edit')->with('success', 'Data has been added');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Category::where('id',$id)->delete();
        return redirect('admin/category');
    }
}
