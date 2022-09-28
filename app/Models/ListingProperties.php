<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingProperties extends Model
{
	protected $table = 'property_listing';
	public function property_attachment(){
		return $this->hasMany('App\Models\PropertyAttachment', 'property_id');
    }
    use HasFactory;
}
