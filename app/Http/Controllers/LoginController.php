<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use app\Models\User;

class LoginController extends Controller
{

    public function login(Request $request){
        try{
            $where = ['username'=>$request->username];
            $user = new User;
            $data = $user->where($where)->firstOrFail();
            if ($data->username) {
                $password = Hash::check($request->password, $data->password);
                if($password){
                    return response()->json($data);
                }
            } else {
                return response()->json([
                  'msg' => 'User credentials invalid'  ], 401);
              }
        } catch(ModelNotFoundException $e) {
            return response()->json([
                'msg' => 'User credentials invalid'  ], 401);
        }
    }
}
