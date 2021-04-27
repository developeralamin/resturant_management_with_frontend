<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{

	protected $fillable =['title','sub_title','image'];
	
    use HasFactory;
}
