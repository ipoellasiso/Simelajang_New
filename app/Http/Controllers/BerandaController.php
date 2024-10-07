<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'             => 'Dashboard',
            'active_home1'       => 'active',
            // 'active_kuser'       => 'active',
            'page_title'        => 'Dashboard',
            'breadcumd1'        => 'Dashboard',
            'breadcumd2'        => 'Dashboard',
            'userx'             => UserModel::where('id',$userId)->first(['fullname','role','gambar']),
        );

        return view('Halaman_Dasboard.Beranda', $data);
    }

}
