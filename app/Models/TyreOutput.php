<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TyreOutput extends Model
{
  protected $table = 'tyre_outputs';
  
  protected  $fillable = [
          'output_id',
          'dimention_id',
          'quantity',
          'status'
      ];
  
  public function dimention(): HasOne {
      return $this->hasOne(TyreDimention::class, 'id', 'dimention_id');
  }
}
