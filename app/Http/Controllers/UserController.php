<?php

namespace App\Http\Controllers;

use App\Models\UserModel;
use Illuminate\Hashing\HashServiceProvider;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
        public function index(Request $request)
    {
        // $userId = Auth::guard('web')->user()->id;
        $data = array(
            'title'             => 'Data User',
            'active_side'       => 'active',
            'active_kuser'       => 'active',
            'page_title'        => 'Pengaturan',
            'breadcumd1'        => 'Kelola User',
            'breadcumd2'        => 'List User',
            // 'userx'             => User::where('id',$userId)->first(['name','role','foto']),
        );

        if ($request->ajax()) {

            // $datauser = UserModel::select('id', 'id_opd', 'fullname', 'email', 'role', 'gambar')
            //             ->leftjoin('opd', 'users.id_opd', 'opd.id',)
            //             ->get();

            $datauser = DB::table('users')
                        ->select('users.fullname', 'users.email', 'users.id_opd', 'users.role', 'users.gambar', 'users.verify_key', 'users.id', 'opd.nama_opd')
                        ->join('opd', 'users.id_opd', 'opd.id',)
                        ->get();

            return Datatables::of($datauser)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){

                        $btn = '
                                <a href="javascript:void(0)" title="Edit Data" data-id="'.$row->id.'" class="editUser btn btn-primary btn-sm">
                                    <i class="fa fa-edit"></i> 
                                </a>
                            ';

                        $btn = $btn.'
                                    <a href="javascript:void(0)" title="Hapus Data" data-id="'.$row->id.'" class="deleteUser btn btn-danger btn-sm">
                                        <i class="fa fa-trash"></i> 
                                    </a>
                                    ';

                        return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }

        return view('Kelola_User.User', $data);
    }


    public function store(Request $request)
    {
        request()->validate([
            'gambar' => 'image|mimes:png,jpg,jpeg,gif,svg|max:5000',
        ]);

        $userId = $request->id;
        $user = UserModel::where('id', $userId)->first(['password']);

        $hashPassword = "";
        if($request->password == "" || $request->password == null){
            $hashPassword = $user->password;
        }else{
            $hashPassword = Hash::make($request->password);
        }

        $cek_email = UserModel::where('email', $request->email)->where('id', '!=', $request->id)->first();

        if($cek_email)
        {
            return response()->json(['error'=>'Email sudah ada']);
        }
        else
        {
            $details = [
                'id_opd'  => $request->id_opd,
                'fullname'  => $request->fullname,
                'email'  => $request->email,
                'password'  => $request->password,
                'role'  => $request->role,
            ];

            if ($files = $request->file('gambar')){
                $destinationPath = 'app/assets/images/user/';
                $profileImage = date('YmdHis').".".$files->getClientOriginalExtension();
                $files->move($destinationPath, $profileImage);
                $details['gambar'] = "$profileImage";
            }
        }

            UserModel::updateOrCreate(['id' => $userId], $details);
            return response()->json(['success' =>'Data Berhasil Disimpan']);
        
    }

    public function edit($id)
    {
        $where = array('id' => $id);
        $user = UserModel::where($where)->first();

        return response()->json($user);
    }

    public function destroy($id)
    {
        $data = UserModel::where('id',$id)->first(['gambar']);
        unlink("app/assets/images/user/".$data->gambar);

        UserModel::where('id', $id)->delete();

        return response()->json(['success'=>'Data Berhasil Dihapus']);
    }
}

