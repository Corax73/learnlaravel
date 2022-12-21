<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
	public function images(){
		return $this->hasMany('App\Models\ProductImage');
	}
	
	public function category(){
        return $this->belongsTo('App\Models\Category');
    }
}
