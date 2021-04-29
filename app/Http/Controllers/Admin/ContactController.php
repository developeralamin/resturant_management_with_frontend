<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Session;
use Brian2694\Toastr\Facades\Toastr;


class ContactController extends Controller
{
    public function contact_backend()
    {
    	$this->data['contact']  = Contact::all();
    	return view('admin.contact.index',$this->data);
    }


	 public function show($id)
	 {
	 	$this->data['contact']  = Contact::findOrFail($id);
	 	 return view('admin.contact.show',$this->data);
	 }



    public function destroy($id)
    {
    	Contact::find($id)->delete();
   
    Toastr::success('Contact successfully Delete.','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
