<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Tyre extends Model
{
  protected $table = 'tyres';
  
  protected  $fillable = [
          'name',
          'model_id',
          'brand_id',
          'driveexperience_id',
          'tyre_structure',
          'tyre_features',
          'install_position_image'
      ];
  
  public function model(): HasOne {
      return $this->hasOne(Modelcar::class, 'id', 'model_id');
  }
  
  public function brand(): HasOne {
      return $this->hasOne(Brand::class, 'id', 'brand_id');
  }
  
  public function drive(): HasOne {
      return $this->hasOne(Drive::class, 'id', 'driveexperience_id');
  }
  
  public function images(): HasMany {
        return $this->hasMany(TyreImage::class, 'tyre_id', 'id');
  }
  
  public function dimentions(): HasMany {
        return $this->hasMany(TyreDimention::class, 'tyre_id', 'id');
  }
}
