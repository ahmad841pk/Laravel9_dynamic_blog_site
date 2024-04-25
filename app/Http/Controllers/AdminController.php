<?php

namespace App\Http\Controllers;
use App\Models\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use function Psy\debug;

class AdminController extends Controller
{

    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        $notification = array(
            'message' => 'User Logout successfully',
            'alert-type' => 'success'
            
        );

        return redirect('/login')->with($notification);
    }
    public function profile() {
        $id = Auth::user()->id;
        $adminData= User::find($id);
        return view('admin.admin_profile_view',compact('adminData'));


    } //End Method
    public function editProfile() {
        $id = Auth::user()->id;
        $editData= User::find($id);
        return view('admin.admin_profile_edit',compact('editData'));


    } //End Method

    public function storeProfile(Request $req) {
        $id = Auth::user()->id;
        $Data= User::find($id);
        $Data->name= $req->name;
        $Data->email= $req->email;
        $Data->username= $req->username;

    if($req->file('profile_image')){
        $file = $req->file('profile_image');
        $filename = date('YmdHi').$file->getClientOriginalName();
        $file->move(public_path('upload/admin_images'),$filename);

        $Data['profile_image']= $filename;

    }
    $Data->save();
    
    $notification = array(
        'message' => 'Admin profile Updated successfully',
        'alert-type' => 'success'
        
    );
    return redirect()->route('admin.profile')->with($notification);

    } //End Method

    public function changePassword() {
        
        return view('admin.admin_change_password');


    } //End Method

     public function updatePassword(Request $req){
        $validateData = $req->validate([
        'oldpassword' => 'required',
        'newpassword' => 'required',
        'confirmpassword' => 'required| same:newpassword'
    ]);
    $hashedPassword = Auth::user()->password;
    if(Hash::check($req->oldpassword,$hashedPassword)){

        $users = User::find(Auth::user()->id);
        $users->password = bcrypt($req->newpassword);
        $users->save();
        session()->flash('message','Password Update successfully');
        return redirect()->back();
    }
        else {

            session()->flash('message','old paswword not match');
            return redirect()->back();
            
        }


  


     }  // End Method
    
        
    
}
