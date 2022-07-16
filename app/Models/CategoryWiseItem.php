<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class CategoryWiseItem extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function item(){
        return $this->belongsTo(Item::class, 'item_id', 'id');
    }

}
