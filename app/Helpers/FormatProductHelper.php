<?php

namespace App\Helpers;

use App\Models\Kategori;

class FormatProductHelper
{
    public static function formatResultProduct($product)
    {
        $category = Kategori::find($product->category_id);
         return [
            'product_id'    => $product->id,
            'category'      => $category->category,
            'product'       => $product->product_name,
            'image'         => $product->product_image,
            'price'         => $product->price,
            'qty'           => $product->qty,
            'desc'          => $product->description,
        ];
    }
}