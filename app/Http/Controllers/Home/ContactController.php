<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Carbon\Carbon;

class ContactController extends Controller
{
    public function contact()
    {

      return view('frontend.contact');

    }//End Method

    public function StoreMessage(Request $req)
    {
        Contact::insert([
            'name' => $req->name,
            'phone' => $req->phone,
            'subject' => $req->subject,
            'email' => $req->email,
            'message' => $req->message,
            'created_at' => Carbon::now()
        ]);
        $notification = array(
            'message' => 'Your Message Submitted successfully',
            'alert-type' => 'success'

        );
        return redirect()->back()->with($notification);


    }//End Method

    public function ContactMessage()
    {
        $contacts = Contact::latest()->get();
        return view('admin.contact.allcontact',compact('contacts'));


    }//End Method

    public function DeleteMessage($id)
    {
      Contact::findorFail($id)->delete();

      $notification = array(
        'message' => 'Your Message Deleted successfully',
        'alert-type' => 'success'

    );
    return redirect()->back()->with($notification);

    }//End Method

}
