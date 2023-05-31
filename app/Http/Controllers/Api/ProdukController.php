<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatProductHelper;
use App\Http\Controllers\Controller;
use App\Models\Pruduct;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function getProduct()
    {
        $product = Pruduct::all();
        return FormatProductHelper::resultStatus(true, "Berhasil get data produk", $product);
    }
}
