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
        return $this->hasMany(Posts::class, 'menu', 'id')
                    ->orderBy('created_at', 'desc')
                    ->limit(10);
  }
  
  public function children() {
        return $this->hasMany(Menu::class, 'parent_id', 'id')->orderBy('order');
  }
  
  public function getUrl() {
        if (!empty($this->link)) {
            return url($this->link);
        }
        
        $name = $this->name_show();
        
        switch ($name) {
            case 'Trang chủ':
            case 'Home':
                return route('index');
            case 'Sản phẩm':
            case 'Products':
                return route('list-product');
            case 'Dịch vụ':
            case 'Services':
                return route('services');
            case 'Tin tức':
            case 'News':
            case 'Thông tin':
            case 'Information':
                return route('news-list');
            case 'Hỏi & Đáp':
            case 'FAQ':
                return route('faq');
            case 'Liên hệ':
            case 'Contact':
                return route('contactus');
            case 'Về NQT':
            case 'About NQT':
                return route('nqt');
            case 'Về Trazano':
            case 'About Trazano':
                return route('trazano');
            case 'Khuyến mãi':
            case 'Promotion':
                return route('promotion');
            case 'Tìm đại lý':
            case 'Find Dealer':
                return route('faq');
            default:
                return '#';
        }
  }
}
