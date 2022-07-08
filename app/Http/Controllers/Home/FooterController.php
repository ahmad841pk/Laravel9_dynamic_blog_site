<?php

namespace App\Http\Controllers\Home;
use App\Http\Controllers\Controller;
use App\Models\MultiImage;
use Carbon\Carbon;
use App\Models\Footer;


use Illuminate\Http\Request;

class FooterController extends Controller

{
    public function FooterSetup(){
        $allfooter = Footer::find(1);
        return view('admin.footer.footer_all',compact('allfooter'));


        }// End Method

        public function UpdateFooter(Request $req){
          $footer_id= $req->id;
          Footer::findOrFail($footer_id)->update([
            'number' => $req->number,
            'address' => $req->address,
            'short_description'=>$req->short_description,
            'email'=>$req->email,
            'facebook' => $req->facebook,
            'twitter' => $req->twitter,
            'copyright' => $req->copyright
        ]);
        $notification = array(
            'message' => 'Footer Updated successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);



        }// End Method
}
