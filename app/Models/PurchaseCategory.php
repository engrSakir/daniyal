<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseCategory extends Model
{
    protected $guarded = [];

    public function purchases(){
        return $this->hasMany(Purchase::class, 'category_id', 'id');
    }
}
