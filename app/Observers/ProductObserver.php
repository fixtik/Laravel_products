<?php

namespace App\Observers;

use App\Models\Product;
use function Symfony\Component\String\s;

class ProductObserver
{
    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
       //
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
       //
    }

    /**
     * Handle the Product "updating" event.
     */
    public function updating(Product $product)
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

    /**
     * Получение статуса объекта в зависимости от выбора пользователя
     * @param $status
     * @return string
     */
    protected function getStatus($status)
    {
        $status == 'Доступен' ?  $status = "available" : $status = 'unavailable';
        return $status;
    }
}
