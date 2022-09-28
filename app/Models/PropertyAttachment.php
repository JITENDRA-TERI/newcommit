<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyAttachment extends Model
{
	protected $table = 'property_attachment';
	protected $fillable = ['property_id', 'attachment_path'];
    use HasFactory;
}
