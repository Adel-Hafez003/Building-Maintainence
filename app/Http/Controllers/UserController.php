<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Common\Lexer\Token;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $requset)
    {
      $data=$requset->validate([
        'name'=>'|required|string|max:255',
        'email'=>'|required|email|max:255|unique:users,email',
        'password'=>'|required|string|min:8|'
      ]);
      $user=User::create([
        'name'=>$data['name'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password']),
      ]);
      return response()->json([
        'message'=>'User Registered Successfuly',
       'User'=>$user],201);
    }

    public function login(Request $request)
    {
        $request->validate([
            'email'=>'|required|email',
            'password'=>'|required|string'
        ]);
        if(!Auth::attempt($request->only('email','password')))//  Databaseغير موجودين في ال  passwordوال  email اذا كان التحقق غير صحيح اي انه ال 
            return response()->json(
        [
          'message'=>'invalid email or password',
          'status'=>401,
        ],
       
    );
       $user=User::where('email',$request->email)->firstOrFail();
       $token=$user->createToken('auth_Token')->plainTextToken;
        return response()->json([
            'message'=>'Login  successful',
            'User'=>$user,
            'Token'=>$token
        ],200);
    }
    public function logout(Request $request)
    {
       $request->user()->currentAccessToken()->delete();
       return response()->json([
            'message'=>'Logut  successful',]);
    }


}
