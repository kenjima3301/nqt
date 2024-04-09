<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Promotion extends Model
{
  protected $table = 'promotions';
  
  protected $fillable = [
    'tyre_id',
    'dimention_id',
    'promotion_price',
    'expired',
    'status'
  ];
  
  public function tyre(): HasOne {
      return $this->hasOne(Tyre::class, 'id', 'tyre_id');
  }
  
  public function dimention(): HasOne {
      return $this->hasOne(TyreDimention::class, 'id', 'dimention_id');
  }
}
