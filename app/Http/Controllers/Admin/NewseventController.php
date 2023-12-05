<?php

namespace App\Http\Controllers\Admin;

use App\Models\Newsevent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewseventController extends Controller
{
    public function index()
    {
        $newsevents = Newsevent::latest()->get();
        return view('admin.newsevent', compact('newsevents'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'required|Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $newsevent = new Newsevent();
            $newsevent->user_id = Auth::user()->id;
            $newsevent->title = $request->title;
            $newsevent->slug = Str::slug($request->title.'-'.uniqid());
            $newsevent->description = $request->description;
            $newsevent->image = $this->imageUpload($request, 'image', 'uploads/newsevent');
            $newsevent->created_by = Auth::id();
            $newsevent->ip_address = $request->ip();
            $newsevent->save();

            $notification=array(
                'message'=>'Data Added Successfully',
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
        $newsevents = Newsevent::latest()->get();
        $newseventData = Newsevent::find($id);
        return view('admin.newsevent', compact('newsevents', 'newseventData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'title' => 'required|max:255',
            'description' => 'required',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $newsevent = Newsevent::find($id);
            $newsImg = $newsevent->image;
            if ($request->hasFile('image')) {
                if (!empty($newsevent->image) && file_exists($newsevent->image))
                    unlink($newsevent->image);
                    $newsImg = $this->imageUpload($request, 'image', 'uploads/newsevent');
            }

            $newsevent->user_id = Auth::user()->id;
            $newsevent->title = $request->title;
            $newsevent->slug = Str::slug($request->title.'-'.uniqid());
            $newsevent->description = $request->description;
            $newsevent->image = $newsImg;
            $newsevent->updated_by = Auth::id();
            $newsevent->ip_address = $request->ip();
            $newsevent->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('newsevent.index')->with($notification);

        } catch (\Exception $e) {
            // $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->route('newsevent.index')->with($notification);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $newsevent = Newsevent::find($request->id);
            if($newsevent){
                if(file_exists($newsevent->image) AND !empty($newsevent->image)){
                    unlink($newsevent->image);
                }
                $newsevent->delete();
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
