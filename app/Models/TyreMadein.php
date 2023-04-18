<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TyreMadein extends Model
{
  protected $table = 'tyre_countries';
  
  protected  $fillable = [
          'tyre_dimention_id',
          'madecountry_id'
      ];
  
  public function country(): HasOne {
      return $this->hasOne(Madein::class, 'id', 'madecountry_id');
  }
}
