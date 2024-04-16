<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modelcar extends Model
{
  protected $table = 'models';
  
  protected  $fillable = [
          'name',
          'name_en'
      ];

}
