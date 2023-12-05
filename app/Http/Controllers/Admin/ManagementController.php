<?php

namespace App\Http\Controllers\Admin;

use App\Models\Management;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagementController extends Controller
{
    public function index()
    {
        $management = Management::latest()->get();
        return view('admin.management', compact('management'));
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'phone' => 'required|unique:management,phone|regex:/(01)[0-9]{9}/|digits:11|max:15',
            'image' => 'required|Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $management = new Management();
            $management->name = $request->name;
            $management->designation = $request->designation;
            $management->phone = $request->phone;
            $management->image = $this->imageUpload($request, 'image', 'uploads/management');
            $management->created_by = Auth::id();
            $management->ip_address = $request->ip();
            $management->save();

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
        $management = Management::latest()->get();
        $managementData = Management::find($id);
        return view('admin.management', compact('management', 'managementData'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'name' => 'required|max:100',
            'designation' => 'required|max:100',
            'phone' => 'required|regex:/(01)[0-9]{9}/|digits:11|max:15',
            'image' => 'Image|mimes:jpg,png,gif,webp'
        ]);

        try {
            $management = Management::find($id);

            $manImg = $management->image;
            if ($request->hasFile('image')) {
                if (!empty($management->image) && file_exists($management->image)) {
                    unlink($management->image);
                    $manImg = $this->imageUpload($request, 'image', 'uploads/management');
                }
            }
            $management->name = $request->name;
            $management->designation = $request->designation;
            $management->phone = $request->phone;
            $management->image = $manImg;
            $management->updated_by = Auth::id();
            $management->ip_address = $request->ip();
            $management->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('management.index')->with($notification);

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
            $management = Management::find($request->id);
            if($management){
                if(file_exists($management->image) AND !empty($management->image)){
                    unlink($management->image);
                }
                $management->delete();
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
