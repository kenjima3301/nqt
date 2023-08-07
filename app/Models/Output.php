<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Output extends Model
{
   protected $table = 'outputs';
   
   protected $fillable = [
       'output_code',
       'user_id',
       'dealer_id',
       'note',
       'file',
       'status'
   ];
   
   public function dimentions(): HasMany {
        return $this->hasMany(TyreOutput::class, 'output_id', 'id');
  }
}
