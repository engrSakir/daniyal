<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SetMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function set_menu_wisse_items(){
        return $this->hasMany(SetMenuWiseItem::class, 'set_menu_id', 'id');
    }
}
