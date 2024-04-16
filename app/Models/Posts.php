<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Posts extends Model
{
    protected $table = 'posts';
  
  protected  $fillable = [
          'type_id',
          'title',
          'title_en',
          'slug',
          'content',
          'content_en',
          'status'
      ];
  
    public function type(): HasOne {
      return $this->hasOne(PostType::class, 'id', 'type_id');
  }
}
