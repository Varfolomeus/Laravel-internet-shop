<?php

namespace App\Observers;
use App\Models\Product;
use App\Models\Subscription;

class ProductObserver
{
    public function updating(Product $product)
    {
        $oldCount = $product->getOriginal('count');
        if (+$product->count > $oldCount && $oldCount == 0) {
            Subscription::sendEmailsBySubscription($product);
            // dd('send info to subscribers');
        }
    }
}
