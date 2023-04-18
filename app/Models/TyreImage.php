<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TyreImage extends Model
{
  protected $table = 'tyre_images';
  
  protected  $fillable = [
          'tyre_id',
          'image'
      ];
}
