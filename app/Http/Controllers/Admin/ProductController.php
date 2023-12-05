<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->get();
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product', compact('product', 'category', 'brand'));
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'required|Image|mimes:jpg,jpeg,png,gif',
            'other_img.*' => 'mimes:jpg,jpeg,png,bmp,gif'
        ]);

        try {
            DB::beginTransaction();
            $product = new Product();
            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name.'-'.uniqid());
            $product->price = $request->price;
            $product->description = $request->description;
            $product->is_new = $request->is_new;
            $product->feature = $request->feature;
            $product->image = $this->imageUpload($request, 'image', 'uploads/product');
            $product->created_by = Auth::id();
            $product->ip_address = $request->ip();
            $product->save();

            $othersImage = $this->imageUpload($request, 'other_img', 'uploads/product');
            if (is_array($othersImage) && count($othersImage)) {
                foreach ($othersImage as $image) {
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->other_img = $image;
                    $productImage->save();
                }
            }

            DB::commit();
            $notification=array(
                'message'=>'Product Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            // return $e->getMessage();
            DB::rollBack();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $product = Product::latest()->get();
        $productData = Product::with('images')->find($id);
        $category = Category::all();
        $brand = Brand::all();
        return view('admin.product', compact('product', 'category', 'productData', 'brand'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'image' => 'Image|mimes:jpg,jpeg,png,gif',
            'other_img.*' => 'mimes:jpg,jpeg,png,bmp,gif'
        ]);

        try {
            DB::beginTransaction();
            $product = Product::find($id);

            $proImg = $product->image;
            if ($request->hasFile('image')) {
                if (!empty($product->image) && file_exists($product->image)) 
                    unlink($product->image);
                    $proImg = $this->imageUpload($request, 'image', 'uploads/product');
            }

            $product->category_id = $request->category_id;
            $product->brand_id = $request->brand_id;
            $product->name = $request->name;
            $product->slug = Str::slug($request->name.'-'.uniqid());
            $product->price = $request->price;
            $product->description = $request->description;
            $product->is_new = $request->is_new;
            $product->feature = $request->feature;
            $product->image = $proImg;
            $product->created_by = Auth::id();
            $product->ip_address = $request->ip();
            $product->save();

            $othersImage = $this->imageUpload($request, 'other_img', 'uploads/product');
            if (is_array($othersImage) && count($othersImage)) {
                foreach ($othersImage as $image) {
                    $productImage = new ProductImage();
                    $productImage->product_id = $product->id;
                    $productImage->other_img = $image;
                    $productImage->save();
                }
            }

            DB::commit();
            $notification=array(
                'message'=>'Product Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('product.index')->with($notification);

        } catch (\Exception $e) {
            // return $e->getMessage();
            DB::rollBack();
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
            $product = Product::find($request->id);
            if($product){
                if(file_exists($product->image) AND !empty($product->image)){
                    unlink($product->image);
                }
                
                $subImage = ProductImage::where('product_id', $product->id)->get();
                if($subImage->count() > 0){
                    foreach ($subImage as $value) {
                        if(!empty($value)){
                            unlink($value->other_img);
                        }
                    } 
                    ProductImage::where('product_id', $product->id)->delete();
                }
                
                $product->delete();
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


    // Remove Image
    public function removeImage($id)
    {
        try {
            $image = ProductImage::find($id);
            $image->delete();
            if(file_exists($image->other_img) && !empty($image->other_img)) {
                unlink($image->other_img);
            }
            return response(true);
        } catch (\Exception $e) {
            return response(false);
        }
    }
}
