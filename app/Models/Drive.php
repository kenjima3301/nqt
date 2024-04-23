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
  
  public function name_show(){
        if(session()->get('language')=='en'){
            return $this->name_en;
        }
        else{
            return $this->name;
        }
    }
    
    public function description_show(){
        if(session()->get('language')=='en'){
            return $this->description_en;
        }
        else{
            return $this->description;
        }
    }
}
