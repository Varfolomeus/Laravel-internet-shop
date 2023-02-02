<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = ['user_id'];

    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot('count')
            ->withTimestamps();
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }
    public function getOrderCost()
    {
        $sum = 0;
        foreach (
            $this->products()
                ->withTrashed()
                ->get()
            as $product
        ) {
            $sum += $product->getPriceForCount();
        }
        return $sum;
    }
    public function saveOrder($name, $phone)
    {
        // dd('hello from this save', $this->status);

        if ($this->status == 0) {
            $this->name = $name;
            $this->phone = $phone;
            $this->status = 1;
            $this->save();
            session()->forget('orderId');

            return true;
        } else {
            return false;
        }
    }
}
