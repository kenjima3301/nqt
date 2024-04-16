<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class TyreStructure extends Model
{
  protected $table = 'tyre_structures';
  
  protected $fillable = [
      'name',
      'name_en'
  ];
  
}
