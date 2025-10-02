<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'title',
        'title_en', 
        'description',
        'description_en',
        'content',
        'content_en',
        'image',
        'icon',
        'status',
        'order'
    ];
    
    public function title_show() {
        if(session()->get('language') == 'en') {
            return $this->title_en ?: $this->title;
        }
        return $this->title;
    }
    
    public function description_show() {
        if(session()->get('language') == 'en') {
            return $this->description_en ?: $this->description;
        }
        return $this->description;
    }
    
    public function content_show() {
        if(session()->get('language') == 'en') {
            return $this->content_en ?: $this->content;
        }
        return $this->content;
    }
    
    public function scopeActive($query) {
        return $query->where('status', 'active');
    }
}
