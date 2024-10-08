@extends('Template.Layout')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row">
            <h4 class="card-title">{{ $title }}</h4>
            <a class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto" href="javascript:void(0)" id="createJenispajak" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                <i class="fas fa-pencil-alt"></i>
            </a>
        </div>
        <div class="m-t-25">
            <table id="data-table" class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Jenis Pajak</th>
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

@include('Master_Data.Jenispajak.Modal.Tambah')
@include('Master_Data.Jenispajak.Fungsi.Fungsi')
@endsection