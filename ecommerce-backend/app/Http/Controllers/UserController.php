<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    function register(Request $request)
    {
        $rules = array(
            'name' => 'required|max:100',
            'email' => 'required|email|exists:users,email|max:50',
            'password' => 'required|min:6|max:12'
        );
        $validator = Validator::make($request->all, $rules);
        // if ($validator->fails()){
        //     return $validator->errors();
        // }
        return $validator->fails() ? $validator->errors() : $request->input();
        //input method returns all the input received
        // $user = new User;
        // $user->name=$request->input('name');

        
    }
}