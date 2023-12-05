<?php

namespace App\Http\Controllers\Admin;

use App\Models\Slider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::latest()->get();
        return view('admin.slider', compact('slider'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'max:255',
            'image' => 'required|Image|mimes:jpeg,jpg,png,gif',
        ]);

        try {
            $slider = new Slider();
            $slider->title = $request->title;
            $slider->image = $this->imageUpload($request, 'image', 'uploads/slider');
            $slider->created_by = Auth::id();
            $slider->ip_address = $request->ip();
            $slider->save();

            $notification=array(
                'message'=>'Slider Added Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            return $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function edit($id)
    {
        $slider = Slider::latest()->get();
        $sliderData = Slider::find($id);
        return view('admin.slider', compact('slider', 'sliderData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'max:255',
            'image' => 'Image|mimes:jpeg,jpg,png,gif',
        ]);

        try {
            $slider = Slider::find($id);
            //image update
            $sliderImg = $slider->image;
            if ($request->hasFile('image')) {
                if (!empty($slider->image) && file_exists($slider->image)) 
                    unlink($slider->image);
                $sliderImg = $this->imageUpload($request, 'image', 'uploads/slider');
            }
            $slider->title = $request->title;
            $slider->image = $sliderImg;
            $slider->updated_by = Auth::id();
            $slider->ip_address = $request->ip();
            $slider->save();

            $notification=array(
                'message'=>'Slider Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('slider.index')->with($notification);

        } catch (\Exception $e) {
            return $e->getMessage();
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
            $slider = Slider::find($request->id);
            if($slider){
                if(file_exists($slider->image) AND !empty($slider->image)){
                    unlink($slider->image);
                }
                
                $slider->delete();
            }

            return response()->json([
                'message'=>'Data Deleted Successfully',
                'success'=> true
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message'=>'Something went wrong!',
                'success'=> false
            ]);
        }
        
        
    }
}
