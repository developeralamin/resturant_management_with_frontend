<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use App\Models\Slider;
use App\Models\Contact;
use App\Models\Reservation;


class DashboardController extends Controller
{
    public function index()
    {
    	$this->data['category']        = Category::count();
    	$this->data['itemcount']       = Item::count();
    	$this->data['slidercount']     = Slider::count();
    	$this->data['contactcount']     = Contact::count();

    	$this->data['reserve']     = Reservation::where('status',false)->get();

    	return view('admin.dashboard',$this->data);
    }
}
