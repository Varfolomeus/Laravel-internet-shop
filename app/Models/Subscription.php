<?php

namespace App\Models;

use App\Mail\SendSubscriptionMessage;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    protected $fillable = ['email', 'product_id'];

    use HasFactory;

    public function scopeActiveByProductId($query, $productId)
    {
        return $query->where('remind_status', 0)->where('product_id', $productId);
    }
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
    public static function sendEmailsBySubscription(Product $product)
    {
        $subscriptions = self::activeByProductId($product->id)->get();
        // dd($product);
        foreach ($subscriptions as $subscription) {
            // dd($product);

            Mail::to($subscription->email)->send(new SendSubscriptionMessage($product));
            $subscription->remind_status = 1;
            $subscription->save();
        }
    }
}
