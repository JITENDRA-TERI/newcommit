<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageGallery extends Model
{
	protected $table = 'image_gallery';
	protected $fillable = ['image_title', 'image_name', 'image_order', 'publish'];  
    use HasFactory;
}
