<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatCategoryHelper;
use App\Http\Controllers\Controller;
use App\Models\Kategori;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function getCategory()
    {
        $kategori = Kategori::all();
        return FormatCategoryHelper::resultStatus(true, "Berhasil get kategori", $kategori);
    }

    public function getPerCategory($id_category)
    {
        
    }

}
