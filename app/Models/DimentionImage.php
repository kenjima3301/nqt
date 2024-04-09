<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DimentionImage extends Model
{
  protected $table = 'dimention_images';
  
  protected $fillable = [
      'dimention_id',
      'image',
      'order'
  ];
}
