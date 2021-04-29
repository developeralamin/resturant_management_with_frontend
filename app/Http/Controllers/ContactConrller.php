<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;

class ContactConrller extends Controller
{
    public function frontend(Request $request)
    {
    	 $this->validate($request,[
            'name'                   => 'required',
            'email'                  => 'required',
            'subject'                => 'required',
            'message'                => 'required',
        ]);

    	  $contact                   = new Contact();
         $contact->name              = $request->name;
        $contact->email              = $request->email;
         $contact->subject           = $request->subject;
        $contact->message            = $request->message;
       
      
        $contact->save();

       Toastr::success('Message request sent successfully.','Success',["positionClass" => "toast-top-right"]);

       return redirect()->back();
    }
}
