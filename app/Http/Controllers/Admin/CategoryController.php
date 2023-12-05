<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index()
    {
        $category = Category::with(['parent' => function ($q) {
            $q->select('id', 'name');
        }])->get();
        return view('admin.category', compact('category'));
    }

    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|unique:categories,name|max:100',
        ]);

        try {
            $category = new Category();
            $category->parent_id = $request->parent_id ?? 0;
            $category->name = $request->name;
            $category->image = $this->imageUpload($request, 'image', 'uploads/category');
            $category->created_by = Auth::id();
            $category->ip_address = $request->ip();
            $category->save();

            $notification = array(
                'message' => 'Category Added Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $e->getMessage();
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $category = Category::latest()->get();
        $categoryData = Category::find($id);
        return view('admin.category', compact('category', 'categoryData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:100|unique:categories,name,' . $id,
        ]);

        try {
            $category = Category::find($id);
            $category->parent_id = $request->parent_id ?? 0;
            $category->name = $request->name;

            //image update
            $categoryImg = $category->image;
            if ($request->hasFile('image')) {
                if (!empty($category->image) && file_exists($category->image)) {
                    unlink($category->image);
                }

                $categoryImg = $this->imageUpload($request, 'image', 'uploads/category');
            }
            $category->image = $categoryImg;
            $category->updated_by = Auth::id();
            $category->ip_address = $request->ip();
            $category->save();

            $notification = array(
                'message' => 'Category Updated Successfully',
                'alert-type' => 'success',
            );
            return Redirect()->route('category.index')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification = array(
                'message' => 'Something went wrong!',
                'alert-type' => 'error',
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $category = Category::find($request->id);
            if ($category) {
                $category->delete();
            }

            return response()->json([
                'message' => 'Data Deleted Successfully',
                'success' => true,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Something went wrong!',
                'success' => false,
            ]);
        }
    }
}
