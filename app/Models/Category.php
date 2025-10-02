<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'description',
        'description_en',
        'image',
        'status',
        'order'
    ];
    
    public function name_show() {
        if(session()->get('language') == 'en') {
            return $this->name_en ?: $this->name;
        }
        return $this->name;
    }
    
    public function description_show() {
        if(session()->get('language') == 'en') {
            return $this->description_en ?: $this->description;
        }
        return $this->description;
    }
    
    public function posts() {
        return $this->hasMany(Posts::class, 'category_id');
    }
    
    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
    
    protected static function boot() {
        parent::boot();
        
        static::creating(function ($category) {
            if (empty($category->slug)) {
                $category->slug = Str::slug($category->name);
            }
        });
    }
}
