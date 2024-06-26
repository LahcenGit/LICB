<?php

namespace App\Helpers;

class ProductHelper
{
    public static function getProductBadge($product)
    {
        if ($product->isOnPromo()) {
            return '<span class="stock-status promo-stock">Promo</span>';
        } elseif ($product->isNew()) {
            return '<span class="stock-status new-stock">New</span>';
        } elseif ($product->status == 2) {
            return '<span class="stock-status soon">SOON</span>';
        } elseif ($product->status == 3) {
            return '<span class="stock-status back-stock">IT\'S BACK</span>';
        } elseif ($product->status == 5) {
            return '<span class="stock-status out-stock">Out of stock</span>';
        } else {
            return '<span class="stock-status in-stock">In stock</span>';
        }
    }
}
