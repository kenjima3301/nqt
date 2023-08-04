<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DealerTyre extends Model
{
  protected $table = 'dealer_tyres';
  
  protected $fillable = [
    'dealer_id',  
    'dimention_id',
    'total',
    'status'
  ];
}
