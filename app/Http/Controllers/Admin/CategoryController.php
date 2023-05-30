<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryFormRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');
    }
    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $validateData = $request->validated();
        $category = new Category;
        $category->name = $validateData['name'];
        $category->phone = Str::slug($validateData['phone']);
        $category->address = $validateData['address'];

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('upload/category/', $filename);
            $category->image = $filename;
        }

        $category->lincense_plates = $validateData['lincense_plates'];
        $category->note = $validateData['note'];

        $category->status = $request->status == true ? '1' : '0';
        $category->save();

        return redirect('admin/category')->with('message', 'category added successfully');
    }
    public function edit(Category $category)
    {
        return view('admin/category.edit', compact('category'));
    }

    public function update(CategoryFormRequest $request, $category)
    {

        $validateData = $request->validated();


        try {
            $category = Category::findOrFail($category);
        } catch (ModelNotFoundException $e) {
            return response()->view('errors.404', [], 404); // Custom error view
        }


        $category->name = $validateData['name'];
        $category->phone = Str::slug($validateData['phone']);
        $category->address = $validateData['address'];




        if ($request->hasFile('image')) {
            $path = 'upload/category/' . $category->image;
            if (File::exists($path)) {
                File::delete($path);
            } else {
                session()->flash('message', 'File not found');
            }

            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;

            $file->move('upload/category/', $filename);
            $category->image = $filename;
        } else {
            session()->flash('message', 'No image file uploaded');
        };



        $category->lincense_plates = $validateData['lincense_plates'];
        $category->note = $validateData['note'];

        $category->status = $request->status == true ? '1' : '0';
        $category->update();

        return redirect('admin/category')->with('message', 'category update successfully');
    }
}
