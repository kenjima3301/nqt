<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class DealerTyre extends Model
{
  protected $table = 'dealer_tyres';
  
  protected $fillable = [
    'dealer_id',  
    'dimention_id',
    'total',
    'status'
  ];
  
  public function dimention(): HasOne {
      return $this->hasOne(TyreDimention::class, 'id', 'dimention_id');
  }
}
