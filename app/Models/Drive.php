<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Drive extends Model
{
  protected $table = 'driveexperiences';
  
  protected  $fillable = [
          'name',
          'name_en',
          'description',
          'description_en',
          'features'
      ];
}
