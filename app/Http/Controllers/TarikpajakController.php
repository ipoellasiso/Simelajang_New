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

        $datasp2d = $request->input('jsontextarea');
        $dt = json_decode($datasp2d, true);
        $detail_belanja = $dt["ls"]["detail_belanja"];
        $pajak_potongan = $dt["ls"]["pajak_potongan"];

        $ceksp2d = Sp2dModel::where('nomor_sp2d', $dt["ls"]["header"]["nomor_sp_2_d"])->count();
        if($ceksp2d > 0)
        {
            return redirect()->back()->with('error', 'SP2D Sudah Ada');
        }

        // Simpan data JSON ke dalam database
        $datasp2d = new Sp2dModel();
        $datasp2d->idhalaman = $nomoracak;
        $datasp2d->jenis = $dt["jenis"];
        $datasp2d->tahun = $dt["ls"]["header"]["tahun"];
        $datasp2d->nomor_rekening = $dt["ls"]["header"]["nomor_rekening"];
        $datasp2d->nama_bank = $dt["ls"]["header"]["nama_bank"];
        $datasp2d->nomor_sp2d = $dt["ls"]["header"]["nomor_sp_2_d"];
        $datasp2d->tanggal_sp2d = Carbon::Parse($dt["ls"]["header"]["tanggal_sp_2_d"])->format('Y-m-d');
        $datasp2d->nama_skpd = $dt["ls"]["header"]["nama_skpd"];
        $datasp2d->nama_sub_skpd = $dt["ls"]["header"]["nama_sub_skpd"];
        $datasp2d->nama_pihak_ketiga = $dt["ls"]["header"]["nama_pihak_ketiga"];
        $datasp2d->no_rek_pihak_ketiga = $dt["ls"]["header"]["no_rek_pihak_ketiga"];
        $datasp2d->nama_rek_pihak_ketiga = $dt["ls"]["header"]["nama_rek_pihak_ketiga"];
        $datasp2d->bank_pihak_ketiga = $dt["ls"]["header"]["bank_pihak_ketiga"];
        $datasp2d->npwp_pihak_ketiga = $dt["ls"]["header"]["npwp_pihak_ketiga"];
        $datasp2d->keterangan_sp2d = $dt["ls"]["header"]["keterangan_sp2d"];
        $datasp2d->nilai_sp2d = $dt["ls"]["header"]["nilai_sp2d"];
        $datasp2d->nomor_spm =  $dt["ls"]["header"]["nomor_spm"];
        $datasp2d->tanggal_spm = Carbon::Parse( $dt["ls"]["header"]["tanggal_spm"])->format('Y-m-d');
        $datasp2d->nama_ibu_kota = $dt["ls"]["header"]["nama_ibu_kota"];
        $datasp2d->nama_bud_kbud = $dt["ls"]["header"]["nama_bud_kbud"];
        $datasp2d->jabatan_bud_kbud = $dt["ls"]["header"]["jabatan_bud_kbud"];
        $datasp2d->nip_bud_kbud = $dt["ls"]["header"]["nip_bud_kbud"];
        $datasp2d->save();

        foreach($detail_belanja as $row){
            $databelanja1 = [
                'norekening' => $row["kode_rekening"],
                'uraian' => $row["uraian"],
                'nilai' => $row["jumlah"],
                'id_sp2d' => $nomoracak
            ];
            DB::table('belanja1')->insert($databelanja1);
        }

        if ($pajak_potongan == null){
            echo "<h3>SP2D ini tidak memiliki Potongan</h3>";
        }else{
            foreach($pajak_potongan as $row1){
                $datapotongan2 = [
                // $belanja1 = new ModelBelanja1;
                // $belanja1->norekening = $row["kode_rekening"];
                // $belanja1->uraian = $row["uraian"];
                // $belanja1->nilai = $row["jumlah"];
                // $belanja1->id_sp2d = $nomordok;

                'jenis_pajak' => $row1["nama_pajak_potongan"],
                'ebilling' => $row1["id_billing"],
                'nilai_pajak' => $row1["nilai_sp2d_pajak_potongan"],
                'id_potongan' => $nomoracak,
                'status1' => '0'
                ];
                DB::table('potongan2')->insert($datapotongan2);
            }
        }   

        return redirect()->back()->with('success', 'Data berhasil disimpan!');
    }
}
