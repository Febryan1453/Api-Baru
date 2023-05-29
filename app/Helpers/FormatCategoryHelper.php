<?php

namespace App\Helpers;

class FormatCategoryHelper
{
    public static function formatResultCategory($category)
    {
         return [
            'category_id'       => $category->id,
            'slug'              => $category->slug,
            'category'          => $category->category,
        ];
    }

    public static function resultStatus($status, $message, $dataCategory = null)
    {
        if($dataCategory !== null){

            $data = $dataCategory ->map(function ($item) {
                return FormatCategoryHelper::formatResultCategory($item);
            });
            return response()->json([
                'status'    => $status,
                'message'   => $message,
                'category'  => $data
            ]);
        }else{
            return response()->json([
                'status'    => $status,
                'message'   => $message
            ]);
        }
        
    }
}