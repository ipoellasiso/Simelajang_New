<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = array(
            'title'             => 'Dashboard',
            'active_home1'       => 'active',
            // 'active_kuser'       => 'active',
            'page_title'        => 'Dashboard',
            'breadcumd1'        => 'Dashboard',
            'breadcumd2'        => 'Dashboard',
            // 'userx'             => User::where('id',$userId)->first(['name','role','foto']),
        );

        return view('Halaman_Dasboard.Beranda', $data);
    }

}
