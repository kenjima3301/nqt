<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Input extends Model
{
  protected $table = 'inputs';
  
  protected $fillable = [
      'dimention_id',
      'row_id',
      'total',
      'price',
      'status',
  ];
  
  public function dimention(): HasOne {
      return $this->hasOne(TyreDimention::class, 'id', 'dimention_id');
  }
}
