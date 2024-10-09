<?php

namespace App\Http\Controllers;

use App\Models\PajaklsModel;
use App\Models\PotonganModel;
use App\Models\UserModel;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PajaklsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    // Get data
        public function index(Request $request)
    {
        $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'                => 'Data Pajak LS',
            'active_dtpajak'       => 'active',
            'active_pajakls'       => 'active',
            'page_title'           => 'Pengaturan',
            'breadcumd1'           => 'Kelola User',
            'breadcumd2'           => 'List User',
            'userx'                => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            $datapajakls = DB::table('pajakkpp')
                        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.status2', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby', 'sp2d.nilai_sp2d', 'pajakkpp.nilai_pajak')
                        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
                        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
                        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
                        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
                        ->where('pajakkpp.status2', ['Terima'])
                        // ->whereBetween('sp2d.tanggal_sp2d', ['2024-01-01', '2024-03-31'])
                        ->get();

            return Datatables::of($datapajakls)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id="'.$row->id.'" class="editPajakls btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id="'.$row->id.'" class="deletePajakls btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    // ->addColumn('is_active', function($row1){
                    //     $status = '';
                    //     if($row1->is_active == 'Aktif') {
                    //         $status = '<div class="badge bg-success">'.$row1->is_active.'</div>';
                    //     }else {
                    //         $status = '<div class="badge bg-danger">'.$row1->is_active.'</div>';
                    //     }
                    //     return $status;
                    // })
                    ->addColumn('status2', function($row){
                        if($row->status2 == 'Tolak')
                        {
                            $btn1 = '
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="aktifPajakls btn btn-danger btn-sm">Tolak
                                    </a>
                                  ';
                        }else {
                            $btn1 = '
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="nonaktifPajakls btn btn-secondary btn-sm">Terima
                                    </a>
                                  ';
                        }
                        return $btn1;
                    })
                    ->rawColumns(['action', 'status2'])
                    ->make(true);
        }

        return view('Penatausahaan.Pajakls.Pajakls', $data);
    }

    public function indexpajaklstolak(Request $request)
    {
        if ($request->ajax()) {

            $datapajaklstolak = DB::table('pajakkpp')
                        ->select('potongan2.ebilling', 'sp2d.tanggal_sp2d', 'pajakkpp.nilai_pajak', 'sp2d.nomor_sp2d', 'sp2d.nomor_spm', 'sp2d.tanggal_spm', 'pajakkpp.nomor_npwp', 'pajakkpp.akun_pajak', 'pajakkpp.ntpn', 'pajakkpp.jenis_pajak', 'potongan2.nilai_pajak','pajakkpp.rek_belanja','pajakkpp.nama_npwp', 'pajakkpp.id_potonganls', 'pajakkpp.id', 'potongan2.status1', 'pajakkpp.status2', 'pajakkpp.created_at', 'pajakkpp.bukti_pemby', 'sp2d.nilai_sp2d', 'pajakkpp.nilai_pajak')
                        // ->join('tb_akun_pajak', 'tb_akun_pajak.id', '=', 'pajakkpp.akun_pajak')
                        // ->join('tb_jenis_pajak', 'tb_jenis_pajak.id', '=', 'pajakkpp.jenis_pajak')
                        ->join('potongan2',  'potongan2.id', 'pajakkpp.id_potonganls')
                        ->join('sp2d', 'sp2d.idhalaman', 'potongan2.id_potongan')
                        ->where('pajakkpp.status2', ['Tolak'])
                        // ->whereBetween('sp2d.tanggal_sp2d', ['2024-01-01', '2024-03-31'])
                        ->get();

            return Datatables::of($datapajaklstolak)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id="'.$row->id.'" class="editPajakls btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id="'.$row->id.'" class="deletePajakls btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    // ->addColumn('is_active', function($row1){
                    //     $status = '';
                    //     if($row1->is_active == 'Aktif') {
                    //         $status = '<div class="badge bg-success">'.$row1->is_active.'</div>';
                    //     }else {
                    //         $status = '<div class="badge bg-danger">'.$row1->is_active.'</div>';
                    //     }
                    //     return $status;
                    // })
                    ->addColumn('status2', function($row){
                        if($row->status2 == 'Tolak')
                        {
                            $btn1 = '
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="aktifPajakls btn btn-danger btn-sm">Tolak
                                    </a>
                                  ';
                        }else {
                            $btn1 = '
                                    <a href="javascript:void(0)" data-toggle="tooltip" data-id="'.$row->id.'" class="nonaktifPajakls btn btn-secondary btn-sm">Terima
                                    </a>
                                  ';
                        }
                        return $btn1;
                    })
                    ->rawColumns(['action', 'status2'])
                    ->make(true);
        }

        return view('Penatausahaan.Pajakls.Pajakls');
    }


    public function store(Request $request)
    {
        request()->validate([
            'bukti_pemby' => 'image|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);

        $pajaklsId = $request->id;

        $cek_ebilling = UserModel::where('ebilling', $request->ebilling)->where('id', '!=', $request->id)->first();
        $cek_ntppn = UserModel::where('ntpn', $request->ntpn)->where('id', '!=', $request->id)->first();

        if($cek_ebilling)
        {
            return response()->json(['error'=>'Ebilling sudah ada']);
        }
        elseif($cek_ntppn)
        {
            return response()->json(['error'=>'NTPN sudah ada']);
        }
        else
        {

            $detailspotongan = [
                'ebilling' => $request->ebilling,
                'jenis_pajak' => $request->jenis_pajak,
                'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
            ];

            $detailspajakls = [
                'ebilling' => $request->ebilling, 
                'ntpn' => $request->ntpn, 
                'akun_ajak' => $request->akun_pajak,
                'jenis_pajak' => $request->jenis_pajak,
                'nilai_pajak' =>str_replace('.','', $request->nilai_pajak),
                'rek_belanja' => $request->rek_belanja,
                'nama_npwp' => $request->nama_npwp,
                'nomor_npwp' => $request->nomor_npwp,
                // 'bukti_pemby' => $request->bukti_pemby,
                'status2' => 'Terima',
            ];

            if ($files = $request->file('bukti_pemby')){
                $destinationPath = 'app/assets/images/bukti_pemby_pajak/';
                $profileImage = date('YmdHis').".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $detailspajakls['bukti_pemby'] = "$profileImage";
            }
        }

            PajaklsModel::updateOrCreate(['id' => $pajaklsId], $detailspajakls);
            PotonganModel::updateOrCreate(['id' => $pajaklsId], $detailspotongan);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $pajakls = PajaklsModel::where($where)->first();

        return response()->json($pajakls);
    }

    public function nonaktif($id)
    {
        $pajaklsdt = PajaklsModel::findOrFail($id);
        $pajaklsdt->update([
            'status2' => 'Tolak',
        ]);

        return response()->json(['success'=>'Data Berhasil Dinonaktifkan']);
    }

    public function aktif($id)
    {
        $pajaklsdt = PajaklsModel::findOrFail($id);
        
        $pajaklsdt->update([
            'status2' => 'Terima',
        ]);

        return response()->json(['success'=>'Data Berhasil Diaktifkan']);
    }

    public function destroy($id)
    {
        $data = PajaklsModel::where('id',$id)->first(['bukti_pemby']);
        unlink("app/assets/images/bukti_pemby_pajak/".$data->bukti_pemby);

        PajaklsModel::where('id', $id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}
