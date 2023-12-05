<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Companyprofile;
use Illuminate\Http\Request;

class CompanyprofileController extends Controller
{
    public function index()
    {
        $com_profile = Companyprofile::first();
        return view('admin.company_profile', compact('com_profile'));
    }

    public function update(Request $request, $id)
    {
        try {
            $com_profile = CompanyProfile::find($id);

            //logo image 
            $logoImg = $com_profile->logo;
            if ($request->hasFile('logo')) {
                if (!empty($com_profile->logo) && file_exists($com_profile->logo)) 
                    unlink($com_profile->logo);
                $logoImg = $this->imageUpload($request, 'logo', 'uploads/company');
            }

            $com_profile->com_name = $request->com_name;
            $com_profile->phone = $request->phone;
            $com_profile->phone_two = $request->phone_two;
            $com_profile->email = $request->email;
            $com_profile->address = $request->address;
            $com_profile->address_two = $request->address_two;
            $com_profile->facebook = $request->facebook;
            $com_profile->twitter = $request->twitter;
            $com_profile->youtube = $request->youtube;
            $com_profile->linkedin = $request->linkedin;
            $com_profile->logo = $logoImg;
            $com_profile->map = $request->map;
            $com_profile->save();

            $notification=array(
                'message'=>'Data Updated Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);

        } catch (\Exception $e) {
            $e->getMessage();
            $notification=array(
                'message'=>'Something went wrong!',
                'alert-type'=>'error'
            );
            return Redirect()->back()->with($notification);
        }
    }
}
