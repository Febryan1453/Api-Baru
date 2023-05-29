<?php

namespace App\Helpers;

use App\Models\User;

class FormatUserHelper
{

    public static function formatResultUser($userLogin)
    {
         return [
            'user_id'       => $userLogin->id,
            'name'          => $userLogin->name,
            'email'         => $userLogin->email,
            'number_phone'  => $userLogin->number_phone,
            'device_name'   => $userLogin->device_name,
            'registered'    => date("l, d F Y", strtotime($userLogin->created_at)),
        ];
    }

    public static function resultUser($user_id)
    {
        $userLogin = User::where('id', $user_id)
                            ->get()
                            ->map(function($userLogin){
                               return FormatUserHelper::formatResultUser($userLogin);
                            });
        return $userLogin;
    }

    public static function resultStatus($status, $message, $dataUser = null)
    {
        if($dataUser !== null){
            return response()->json([
                'status'    => $status,
                'message'   => $message,
                'user'      => $dataUser
            ]);
        }else{
            return response()->json([
                'status'    => $status,
                'message'   => $message
            ]);
        }
        
    }

    public static function messageError()
    {
        $msgError = [
            'name.required'             => "Nama masih kosong", 
            'email.required'            => "Email masih kosong", 
            'email.unique'              => "Email sudah terdaftar", 
            'password.required'         => "Password masih kosong", 
            'number_phone.required'     => "Telepon masih kosong", 
        ];   
        return $msgError;     
    }
}