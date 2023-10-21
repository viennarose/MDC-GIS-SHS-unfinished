<?php

namespace App\Http\Controllers\Normal_View;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        return view('normal-view.pages.profile');
    }

    public function update_profile(Request $request, $id){
        $profile = User::find($id);

        $profile->name = $request->input('name');
        $profile->email = $request->input('email');
        $profile->gender = $request->input('gender');
        $profile->phone_number = $request->input('phone_number');

        if($request->hasFile('profile_image')){

            $file = $request->file('profile_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'. $extention;
            $file->move('user_img/', $filename);
            $profile->profile_image = $filename;

    }

    $profile->update();
    return redirect()->back()->with('message', 'Profile updated successfully!');

    }
}
