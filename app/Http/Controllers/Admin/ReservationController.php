<?php

namespace App\Http\Controllers\Admin;

use App\Notifications\ReservationConfirmed;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Notification;
use Brian2694\Toastr\Facades\Toastr;

class ReservationController extends Controller
{
    public function index()
    {
    	$this->data['reserve']  = Reservation::all();
    	return view('admin.reservation.index',$this->data);
    }

    public function status($id)
    {
    	$reservation = Reservation::find($id);
    	$reservation->status=true;

    	$reservation->save();
         Notification::route('mail',$reservation->email )
            ->notify(new ReservationConfirmed());

       Toastr::success('Reservation successfully confirmed.','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }

   public function destroy($id)
    {
    	Reservation::find($id)->delete();
   
    Toastr::success('Reservation successfully Delete.','Success',["positionClass" => "toast-top-right"]);
    	return redirect()->back();
    }
}
