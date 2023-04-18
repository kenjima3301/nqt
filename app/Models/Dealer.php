<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dealer extends Model
{
  protected $table = 'dealers';
  
  protected  $fillable = [
          'name',
          'area',
          'province',
          'address',
          'lat',
          'lng',
          'email',
          'phone',
          'image'
      ];
}
