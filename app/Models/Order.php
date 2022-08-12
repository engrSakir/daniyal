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

    public function order_items(){
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

    public function discount_amount(){
        return (($this->discount_percentage / 100) * $this->price());
    }

    public function price(){
        return $this->order_items->sum(function($item){
            return $item->selling_price * $item->quantity;
        });
    }

    public function price_after_discount(){
        return $this->price() - $this->discount_amount() - $this->discount_fixed_amount;
    }

    public function due(){
        return ($this->price_after_discount() - $this->paid_amount);
    }
    
    public function is_due(){
        if($this->due() > 0){
            return true;
        }else{
            return false;
        }
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
