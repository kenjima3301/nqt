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
  
  public function name_show(){
        if(session()->get('language')=='en'){
            return $this->name_en;
        }
        else{
            return $this->name;
        }
    }
}
