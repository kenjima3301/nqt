<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
  protected $table = 'brands';
  
  protected  $fillable = [
          'name',
          'name_en',
          'image'
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
