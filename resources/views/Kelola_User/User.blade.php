@extends('Template.Layout')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row">
            <h4 class="card-title">{{ $title }}</h4>
            <a class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto" href="javascript:void(0)" id="createUser" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </div>
        <div class="m-t-25">
            <table id="data-table" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Opd</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th class="text-center">Role</th>
                        <th class="text-center" width="100px">Status</th>
                        <th class="text-center" width="100px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- datatable ajax --}}
                </tbody>
            </table>
        </div>
    </div>
</div>

@include('Kelola_User.Modal.Tambah')
@include('Kelola_User.Fungsi.Fungsi')
@endsection