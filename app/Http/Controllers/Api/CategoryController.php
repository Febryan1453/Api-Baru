<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatCategoryHelper;
use App\Helpers\FormatProductHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use App\Models\Pruduct;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isEmpty;

class CategoryController extends Controller
{

    public function getCategory()
    {
        $kategori = Kategori::all();
        return FormatCategoryHelper::resultStatus(true, "Berhasil get kategori", $kategori);
    }

    public function getPerCategory($id_category)
    {

        $productCategory = Pruduct::where('category_id',$id_category)->get();

        if ($productCategory->isEmpty()) {
            return FormatCategoryHelper::resultStatus(false, "Data produk tidak ditemukan");
        } else {
            return FormatProductHelper::resultStatus(true, "Berhasil get produk per kategori", $productCategory);
        }

    }

}
