<?php

namespace App\Observers;

use App\Models\Product;
use App\Notifications\CreateProductNotification;
use App\Jobs\CreateNewProductJob;


class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $username = auth()->user();
        if ($username) {
            $username->notify(new CreateProductNotification($product->name, $username->name));
            dispatch(new CreateNewProductJob());
        }


    }

    public function updating(Product $product)
    {
        if(!auth()->user()->HasRole('admin') && $product->isDirty('article')) {
            return false;
        }
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
       //
    }


    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "restored" event.
     */
    public function restored(Product $product): void
    {
        //
    }

    /**
     * Handle the Product "force deleted" event.
     */
    public function forceDeleted(Product $product): void
    {
        //
    }


}
