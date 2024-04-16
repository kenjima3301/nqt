<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionContent extends Model
{
  protected $table = 'section_contents';
  
  protected $fillable = [
    'key',
    'name',
    'name_en'
  ];
}
