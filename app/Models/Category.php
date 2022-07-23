<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function category_wise_items(){
        return $this->hasMany(CategoryWiseItem::class, 'category_id', 'id');
    }

    public function sub_categories(){
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    public function total_sell_of_today(){
        $amount = 0;
        foreach ($this->category_wise_items as $cwi){
            $amount += $cwi->order_items()->whereDate('created_at', Carbon::today())->whereHas('order', function($order){
                $order->where('status', 'Complete');
            })->sum('selling_price');
        }
        return $amount;
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
