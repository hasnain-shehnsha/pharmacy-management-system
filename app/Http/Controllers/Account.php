<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Account;
use Illuminate\Support\Facades\Hash;

class AccountController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::  attempt ($credentials )){
        return direct ('/dashboard' );
        }
        return back()->withErrors(['email' => 'Invalid credentials']);
         
    }
}