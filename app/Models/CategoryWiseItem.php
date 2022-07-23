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

    public function category(){
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function sub_category_name(){
        return SubCategory::find($this->sub_category_id)->name ?? null;
    }

}
