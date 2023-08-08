<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class OrderTyre extends Model
{
  protected $table = 'order_tyres';
  
  protected $fillable = [
      'order_id',
      'dimention_id',
      'quantity'
  ];
  
  public function dimention(): HasOne {
      return $this->hasOne(TyreDimention::class, 'id', 'dimention_id');
  }
}
