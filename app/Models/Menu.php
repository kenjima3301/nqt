<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
  protected $table = 'menus';
  
  protected $fillable = [
      'name',
      'name_en',
      'link',
      'parent_id',
      'order'
  ];
  
  public function name_show(){
        if(session()->get('language')=='en'){
            return $this->name_en;
        }
        else{
            return $this->name;
        }
    }
    
  public function posts(): HasMany {
        return $this->hasMany(Posts::class, 'menu', 'id');
  }
}
