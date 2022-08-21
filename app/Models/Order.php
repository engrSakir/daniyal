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

    public function total_discount_amount(){
        // percentage and fixed amount discount
        return ((($this->discount_percentage / 100) * $this->regular_price()) + $this->discount_fixed_amount);
    }

    public function discount_amount_by_percentage(){
        // percentage and fixed amount discount
        return ((($this->discount_percentage / 100) * $this->regular_price()));
    }

    public function regular_price(){
        return $this->order_items->sum(function($item){
            return $item->selling_price * $item->quantity;
        });
    }

    public function due(){
        return ($this->payable_amount - $this->paid_amount);
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
