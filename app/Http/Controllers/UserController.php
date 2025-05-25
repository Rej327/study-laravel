<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        // Logic to display the user list
        if(Auth::user()->isAdmin()) {
            return redirect()->route('dashboard');
        }
        return view('user.user');
    }
}
