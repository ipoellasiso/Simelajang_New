<?php

namespace App\Http\Controllers;

use App\Models\Sp2dModel;
use App\Models\UserModel;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

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

    public function save_json(Request $request)
    {
        // Validasi input
        $nomoracak = Str::random(10);

        

        // $datasp2d = new Sp2dModel();
        $datasp2d = [
            'jenis1' => $request->jenis,
            // 'tahun' => $request["ls"]["header"]["tahun"],
        ];
        
        foreach($datasp2d As $dt)
        {
            // dd($dt);
    
        $dataArray = json_decode($dt, true);
        // dd($datasp2d);
        // dd($request);
        // Simpan data JSON ke dalam database
        // $post = DB::table('sp2d')->get();
        // $post->data = $request->input('data');
        // $datasp2d = new Sp2dModel();
        // $datasp2d->idhalaman = $nomoracak;
        // $datasp2d->jenis = $dt["jenis"];
        // $datasp2d->tahun = $dt["ls"]["header"]["tahun"];
        // $datasp2d->nomor_rekening = $dt["ls"]["header"]["nomor_rekening"];
        // $datasp2d->nama_bank = $dt["ls"]["header"]["nama_bank"];
        // $datasp2d->nomor_sp2d = $dt["ls"]["header"]["nomor_sp_2_d"];
        // $datasp2d->tanggal_sp2d = Carbon::Parse($dt["ls"]["header"]["tanggal_sp_2_d"])->format('Y-m-d');
        // $datasp2d->nama_skpd = $dt["ls"]["header"]["nama_skpd"];
        // $datasp2d->nama_sub_skpd = $dt["ls"]["header"]["nama_sub_skpd"];
        // $datasp2d->nama_pihak_ketiga = $dt["ls"]["header"]["nama_pihak_ketiga"];
        // $datasp2d->no_rek_pihak_ketiga = $dt["ls"]["header"]["no_rek_pihak_ketiga"];
        // $datasp2d->nama_rek_pihak_ketiga = $dt["ls"]["header"]["nama_rek_pihak_ketiga"];
        // $datasp2d->bank_pihak_ketiga = $dt["ls"]["header"]["bank_pihak_ketiga"];
        // $datasp2d->npwp_pihak_ketiga = $dt["ls"]["header"]["npwp_pihak_ketiga"];
        // $datasp2d->keterangan_sp2d = $dt["ls"]["header"]["keterangan_sp2d"];
        // $datasp2d->nilai_sp2d = $dt["ls"]["header"]["nilai_sp2d"];
        // $datasp2d->nomor_spm =  $dt["ls"]["header"]["nomor_spm"];
        // $datasp2d->tanggal_spm = Carbon::Parse( $dt["ls"]["header"]["tanggal_spm"])->format('Y-m-d');
        // $datasp2d->nama_ibu_kota = $dt["ls"]["header"]["nama_ibu_kota"];
        // $datasp2d->nama_bud_kbud = $dt["ls"]["header"]["nama_bud_kbud"];
        // $datasp2d->jabatan_bud_kbud = $dt["ls"]["header"]["jabatan_bud_kbud"];
        // $datasp2d->nip_bud_kbud = $dt["ls"]["header"]["nip_bud_kbud"];
        dd($dataArray);
        // $datasp2d->save();
    }

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
