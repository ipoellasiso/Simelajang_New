<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function index()
    {
        $data = array(
            'title'             => 'Halaman Login',
            // 'active_home1'       => 'active',
            // 'active_kuser'       => 'active',
            'page_title'        => 'Login',
            'breadcumd1'        => 'Login',
            'breadcumd2'        => 'Login',
            // 'userx'             => User::where('id',$userId)->first(['name','role','foto']),
        );

        return view('Auth.Login', $data);
    }
}
