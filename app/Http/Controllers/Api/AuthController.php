<?php

namespace App\Http\Controllers\Api;

use App\Helpers\FormatUserHelper;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Method : POST
     * Params : 
     * - name           : required
     * - email          : required
     * - password       : required
     * - number_phone   : required
     * - device_name    : opsional
     */
    public function registerUser(Request $req)
    {   

        $validate = Validator::make($req->all(),[
            'name'                      => 'required',
            'email'                     => 'required|unique:users',
            'password'                  => 'required',
            'number_phone'              => 'required',
        ], FormatUserHelper::messageError());

        if($validate->fails()){
            $val = $validate->errors()->all();
            $message = $val[0];
            return FormatUserHelper::resultStatus(false, $message, null);
        }

        $dataUser = User::create([
            'name'                      => $req->name,
            'email'                     => $req->email,            
            'password'                  => $req->password, // Auto Hash karena, cari $casts pada model User
            'number_phone'              => $req->number_phone,
            'device_name'               => $req->device_name,
        ]);

        $message = "Welcome $dataUser->name";
        $userRegister = FormatUserHelper::resultUser($dataUser->id);
        return FormatUserHelper::resultStatus(true, $message, $userRegister);

    }

    public function loginUser(Request $req)
    {
        
        $validate = Validator::make($req->all(),[
           'email'                      => 'required',
           'password'                   => 'required',
        ], FormatUserHelper::messageError());

         if($validate->fails()){
            $val = $validate->errors()->all();
            $message = $val[0];
            return FormatUserHelper::resultStatus(false, $message, null);
        }

        $dataUser = User::where('email', $req->email)->first();

        if($dataUser){
            if(password_verify($req->password, $dataUser->password)){
                $message = "Welcome $dataUser->name";

                $userLogin = FormatUserHelper::resultUser($dataUser->id);
                
                return FormatUserHelper::resultStatus(true, $message, $userLogin);

            }else{
                $message = "Kesalahan";
            }
        }else{
            $message = "Kesalahan";
        }        
        
        return FormatUserHelper::resultStatus(false, $message, null);

    }

}
