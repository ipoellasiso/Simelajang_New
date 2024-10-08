<?php

namespace App\Http\Controllers;

use App\Models\AkunpajakModel;
use Illuminate\Http\Request;
use App\Models\UserModel;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AkunpajakController extends Controller
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
            'title'                  => 'Data OPD',
            'active_sidemdata'       => 'active',
            'active_akunpajak'       => 'active',
            'page_title'             => 'Pengaturan',
            'breadcumd1'             => 'Master Data',
            'breadcumd2'             => 'Data OPD',
            'userx'                  => UserModel::where('id',$userId)->first(['fullname','role','gambar',]),
        );

        if ($request->ajax()) {

            // $datauser = UserModel::select('id', 'id_opd', 'fullname', 'email', 'role', 'gambar')
            //             ->leftjoin('opd', 'users.id_opd', 'opd.id',)
            //             ->get();

            $dataakunpajak = DB::table('tb_akun_pajak')
                        ->select('id', 'akun_pajak')
                        ->get();

            return Datatables::of($dataakunpajak)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                            $btn = '
                                    <a href="javascript:void(0)" title="Edit Data" data-id="'.$row->id.'" class="editAkunpajak btn btn-primary btn-sm">
                                        <i class="fa fa-edit"></i> 
                                    </a>
                                    ';

                            $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id="'.$row->id.'" class="deleteAkunpajak btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Master_Data.Akunpajak.Akunpajak', $data);
    }


    public function store(Request $request)
    {

        $akunpajakId = $request->id;

        $details = [
            'akun_pajak'  => $request->akun_pajak,
        ];

        AkunpajakModel::updateOrCreate(['id' => $akunpajakId], $details);
        return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $akunpajak = AkunpajakModel::where($where)->first();

        return response()->json($akunpajak);
    }

    public function destroy($id)
    {

        AkunpajakModel::where('id', $id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}
