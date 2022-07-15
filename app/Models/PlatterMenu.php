<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class PlatterMenu extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function set_menu_wisse_items(){
        return $this->hasMany(PlatterMenuWiseItem::class, 'platter_menu_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            // ... code here
            $model->slug = Str::slug($model->name, '-');
        });

        self::created(function ($model) {
            // ... code here
            
        });

        self::updating(function ($model) {
            // ... code here
            $model->slug = Str::slug($model->name, '-');
        });

        self::updated(function ($model) {
            // ... code here

        });

        self::deleting(function ($model) {
            // ... code here

        });

        self::deleted(function ($model) {
            // ... code here

        });
    }
}
