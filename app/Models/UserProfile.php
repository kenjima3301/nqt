<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
  protected $table = 'user_profiles';
  
  protected $fillable = [
      'user_id',
      'city',
      'district',
      'commune',
      'address',
      'full_address',
  ];
  
  
}
