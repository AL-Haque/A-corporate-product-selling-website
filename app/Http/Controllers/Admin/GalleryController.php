<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GalleryController extends Controller
{
    public function index()
    {
        $gallery = Gallery::latest()->get();
        return view('admin.gallery', compact('gallery'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'image' => 'required|Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $gallery = new Gallery();
            $gallery->title = $request->title;
            $gallery->image = $this->imageUpload($request, 'image', 'uploads/gallery');
            $gallery->created_by = Auth::id();
            $gallery->ip_address = $request->ip();
            $gallery->save();

            $notification=array(
                'message'=>'Gallery Added Successfully',
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
        $gallery = Gallery::latest()->get();
        $galleryData = Gallery::find($id);
        return view('admin.gallery', compact('gallery', 'galleryData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:50',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $gallery = Gallery::find($id);

            $gallImg = $gallery->image;
            if ($request->hasFile('image')) {
                if (!empty($gallery->image) && file_exists($gallery->image))
                    uniqid($gallery->image);
                    $gallImg = $this->imageUpload($request, 'image', 'uploads/gallery');
            }

            $gallery->title = $request->title;
            $gallery->image = $gallImg;
            $gallery->updated_by = Auth::id();
            $gallery->ip_address = $request->ip();
            $gallery->save();

            $notification=array(
                'message'=>'Gallery Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('gallery.index')->with($notification);

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
            $gallery = Gallery::find($request->id);
            if($gallery){
                if(file_exists($gallery->image) AND !empty($gallery->image)){
                    unlink($gallery->image);
                }
                $gallery->delete();
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
