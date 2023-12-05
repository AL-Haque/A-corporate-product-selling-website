<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();
        return view('admin.about', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'required',
            'image' => 'Image|mimes:jpg,jpeg,png,gif|max:255',
        ]);
        try {
            $about = About::find($id);

            //logo image 
            $aboutImg = $about->image;
            if ($request->hasFile('image')) {
                if (!empty($about->image) && file_exists($about->image)) 
                    unlink($about->image);
                $aboutImg = $this->imageUpload($request, 'image', 'uploads/about');
            }

            $about->title = $request->title;
            $about->description = $request->description;
            $about->updated_by = Auth::id();
            $about->ip_address = $request->ip();
            $about->image = $aboutImg;
            $about->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
