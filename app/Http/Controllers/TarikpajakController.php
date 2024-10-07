<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TarikpajakController extends Controller
{
    public function index()
    {
        $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'             => 'Tarik Data Pajak SIPD RI',
            'active_side_tarik' => 'active',
            'active_tarik'      => 'active',
            'page_title'        => 'Pengaturan',
            'breadcumd1'        => 'Kelola User',
            'breadcumd2'        => 'List User',
            'userx'             => UserModel::where('id',$userId)->first(['fullname','role','gambar']),
        );

        return view('TarikPajak.Pajakls', $data);
    }

    public function save_json()
    {
        
    }
}
