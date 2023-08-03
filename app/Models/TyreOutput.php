<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TyreOutput extends Model
{
  protected $table = 'tyre_outputs';
  
  protected  $fillable = [
          'tyre_id',
          'user_id',
          'quantity'
      ];
  
  public function tyre(): HasOne {
      return $this->hasOne(Tyre::class, 'id', 'tyre_id');
  }
}
