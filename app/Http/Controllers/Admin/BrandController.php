<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::latest()->get();
        return view('admin.brand', compact('brand'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'required|Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $brand = new Brand();
            $brand->name = $request->name;
            $brand->image = $this->imageUpload($request, 'image', 'uploads/brand');
            $brand->created_by = Auth::id();
            $brand->ip_address = $request->ip();
            $brand->save();

            $notification=array(
                'message'=>'Brand Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $brand = Brand::latest()->get();
        $brandData = Brand::find($id);
        return view('admin.brand', compact('brand', 'brandData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $brand = Brand::find($id);
            $brandImg = $brand->image;
            if ($request->hasFile('image')) {
                if (!empty($brand->image) && file_exists($brand->image))
                    uniqid($brand->image);
                    $brandImg = $this->imageUpload($request, 'image', 'uploads/brand');
            }

            $brand->name = $request->name;
            $brand->image = $brandImg;
            $brand->updated_by = Auth::id();
            $brand->ip_address = $request->ip();
            $brand->save();

            $notification=array(
                'message'=>'Brand Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('brand.index')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $brand = Brand::find($request->id);
            if($brand){
                if(file_exists($brand->image) AND !empty($brand->image)){
                    unlink($brand->image);
                }
                $brand->delete();
            }
            
            return response()->json([
                'message'=>'Data Deleted Successfully',
                'success'=> true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message'=>'Something went wrong!',
                'success'=> false
            ]);
        } 
    }
}
