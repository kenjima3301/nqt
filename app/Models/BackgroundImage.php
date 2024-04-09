<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class BackgroundImage extends Model
{
  protected $table = 'background_images';
  
  protected $fillable = [
      'brand_id',
      'image'
  ];
  
  public function brand(): HasOne {
      return $this->hasOne(Brand::class, 'id', 'brand_id');
  }
}
