<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{

    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            "email" =>  "required|email",
            "password" =>  "required",
        ]);
        if($validator->fails()) {
            return response()->json(["validation_errors" => $validator->errors()]);
        }
        $user = User::where("email", $request->email)->where("type", "DRIVER")->first();
        if(is_null($user)) {
            return response()->json(["status" => "failed", "message" => "E-mail não encontrado"]);
        }
        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            $user = Auth::user();
            $user->driver = $user->load('driver');
            $token = $user->createToken('token')->plainTextToken;
            return response()->json(["status" => "success", "login" => true, "token" => $token, "data" => $user]);
        }
        else {
            return response()->json(["status" => "failed", "message" => "Senha incorreta"]);
        }
    }

    public function logout() {
        $user = Auth::user();
        if(!is_null($user)) {
            $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
            return response()->json(["status" => "success"]);
        } else {
            return response()->json(["status" => "failed", "message" => "Usuário não encontrado"]);
        }
    }

}
