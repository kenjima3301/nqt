<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Madein extends Model
{
  protected $table = 'madecountries';
  
  protected  $fillable = [
          'name',
          'name_en',
          'flag'
      ];
}
