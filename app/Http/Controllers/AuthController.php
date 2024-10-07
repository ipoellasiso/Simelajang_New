<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        if(Auth::user())
        {
            return redirect('/dashboard');
        }

        $data = array(
            'title'             => 'Halaman Login',
        );

        return view('Auth.Login', $data);
    }

    public function cek_login(Request $request)
    {
        
    }
}
