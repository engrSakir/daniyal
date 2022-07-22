<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Order extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function table(){
        return $this->belongsTo(Table::class, 'table_id', 'id');
    }

    public function waiter(){
        return $this->belongsTo(Waiter::class, 'waiter_id', 'id');
    }

    public function price(){
        return 0;
    }

    public static function boot()
    {
        parent::boot();

        self::creating(function ($model) {
            // ... code here
        });

        self::created(function ($model) {
            // ... code here
            
        });

        self::updating(function ($model) {
            // ... code here
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
