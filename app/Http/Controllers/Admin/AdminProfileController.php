<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AdminProfileController extends Controller
{
    //Admin profile method
    public function profile(){
        return view('admin.profile.profile');
    }

    public function updateProfile(Request $request){
        $this->validate($request,[
            'name'=>'required|min:6',
            'email'=>'required|email|unique:users,email,'.Auth::guard('system_admin')->id(),
            'role'=>'required',
        ]);
        $admin = Admin::find(Auth::guard('system_admin')->id());
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->role = $request->role;
        // file upload
        if ($request->hasFile('photo')){
            $photo = $request->file('photo');
            $filename = time().".".$photo->getClientOriginalExtension();
            $destination_path = public_path('images');
            $photo->move($destination_path,$filename);
            $admin->photo = $filename;
        }
        $admin->save();
        Session::flash('success','Successfully Profile Updated');
        return redirect()->back();
    }

    //Change password method
    public function updatePassword(Request $request){
        $this->validate($request,[
            'password'=>'required|string|confirmed|min:6|regex:/[a-z]/|regex:/[A-Z]/|regex:/[0-9]/|regex:/[@$!%*#?&]/'
        ]);
        $admin = Admin::find(Auth::guard('system_admin')->id());
        $admin->password = Hash::make($request->password);
        $admin->save();
        Session::flash('success','You Have Successfully Changed Password');
        return redirect()->back();
    }
}
