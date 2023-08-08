<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
  protected $table = 'orders';
  
  protected $fillable = [
      'user_id',
      'order_code',
      'name',
      'phone',
      'address',
      'note',
      'payment',
      'voucher',
      'status',
  ];
  
  public function tyres(): HasMany {
        return $this->hasMany(OrderTyre::class, 'order_id', 'id');
  }
}
