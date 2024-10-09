@extends('Template.Layout')
@section('content')

<div class="card">
    <div class="card-body">
        <div class="d-flex flex-row">
            <h4 class="card-title">{{ $title }}</h4>
        </div>
        <div class="m-t-25">

        <form method="POST" action="{{ url('simpanjson') }}">
        @csrf
        <div class="card">
            <div class="card-body flex flex-col p-6">
                <div class="card-text h-full space-y-4">
                    <div class="input-area">
                        <label for="url" class="form-label">Isi Data Json </label>
                        <!-- <textarea name="textarea" rows="5" cols="40">Write something here</textarea> -->
                        <textarea id="jsontextarea" name="jsontextarea" type="text" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" id="saveBtn" value="create" class="btn btn-secondary">
                            <i class="fa fa-save"></i>  Simpan
                        </button>
                    </div>
                </div>
            </div>
        </div>
        </form>

        <div class="m-t-25">
            <table id="data-table" class="table table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th>Nomor Sp2d</th>
                        <th>Tanggal Sp2d</th>
                        <th>Nama OPD</th>
                        <th class="text-center">Keterangan</th>
                        <th class="text-center" width="100px">nilai_sp2d</th>
                        <th class="text-center">nomor_spm</th>
                        <th class="text-center">Jenis</th>
                    </tr>
                </thead>
                <tbody>
                    {{-- datatable ajax --}}
                </tbody>
            </table>
        </div>

        </div>
    </div>
</div>

@include('TarikPajak.Fungsi.Fungsi')
@endsection