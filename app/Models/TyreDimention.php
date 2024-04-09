<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TyreDimention extends Model
{
    protected $table = 'tyre_dimentions';
  
  protected  $fillable = [
          'tyre_id',
          'size',
          'ply',
          'tread_type',
          'unit',
          'total',
          'price',
          'lr_pr',
          'sevice_index',
          'tread_depth',
          'standard_rim',
          'overall_diameter',
          'section_width',
          'single_kg',
          'single_lbs',
          'single_kpa',
          'single_psi',
          'dual_kg',
          'dual_lbs',
          'dual_kpa',
          'dual_psi'
      ];
  
  public function madeins(): HasMany {
        return $this->hasMany(TyreMadein::class, 'tyre_dimention_id', 'id');
  }
  
  public function tyre(): HasOne {
      return $this->hasOne(Tyre::class, 'id', 'tyre_id');
  }
  
  public function images(): HasMany {
        return $this->hasMany(DimentionImage::class, 'dimention_id', 'id');
  }
  
  public function promotion(): HasOne {
      return $this->hasOne(Promotion::class, 'dimention_id', 'id');
  }
}
