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
    'name_en',
    'content',
    'content_en'
  ];
  
  public function name_show(){
        if(session()->get('language')=='en'){
            return $this->name_en;
        }
        else{
            return $this->name;
        }
    }
    
  public function content_show(){
        if(session()->get('language')=='en'){
            return $this->content_en;
        }
        else{
            return $this->content;
        }
    }
}
