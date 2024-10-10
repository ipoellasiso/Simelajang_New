@extends('Template.Layout')
@section('content')


<div class="card">
<!-- <div class="card-body"> -->
<ul class="nav nav-tabs nav-justified" id="myTabJustified" role="tablist">
    <li class="nav-item">
        <a class="nav-link active" id="home-tab-justified" data-toggle="tab" href="#pajakls" role="tab" aria-controls="home-justified" aria-selected="true">Pajak LS</a>
    </li>
    <li class="nav-item">
        <a class="nav-link" id="profile-tab-justified" data-toggle="tab" href="#pajaklstolak" role="tab" aria-controls="profile-justified" aria-selected="false">Pajak Ls Tolak</a>
    </li>
</ul>

<div class="tab-content m-t-15" id="myTabContentJustified">
    <div class="tab-pane fade show active" id="pajakls" role="tabpanel" aria-labelledby="home-tab-justified">
        
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    <a class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto" href="javascript:void(0)" id="createPajakls" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                        <i class="fas fa-pencil-alt"></i>
                    </a>
                </div>
                {{-- class="m-t-25" --}}
                <div class="table-responsive">
                    <table id="data-table" class="tabelpajaklsterima table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nomor SPM</th>
                                <th>Tanggal SP2D</th>
                                <th>Nomor SP2D</th>
                                <th>Nilai SP2D</th>
                                <th>Akun Pajak</th>
                                <th>Jenis Pajak</th>
                                <th>Nilai Pajak</th>
                                <th>E-Biling</th>
                                <th>NTPN</th>
                                <th>Status</th>
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

    </div>
    <div class="tab-pane fade" id="pajaklstolak" role="tabpanel" aria-labelledby="profile-tab-justified">
        
        <div class="card">
            <div class="card-body">
                <div class="d-flex flex-row">
                    {{-- <h4 class="card-title">{{ $title }}</h4> --}}
                    {{-- <a class="btn btn-secondary btn-tone m-r-5 btn-xs ml-auto" href="javascript:void(0)" id="createPajakls" data-toggle="tooltip" data-placement="top" title="Tambah Data">
                        <i class="fas fa-pencil-alt"></i>
                    </a> --}}
                </div>
                {{-- class="m-t-25" --}}
                <div class="table-responsive">
                    <table id="data-table1" class="tabelpajaklstolak table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">No</th>
                                <th>Nomor SPM</th>
                                <th>Tanggal SP2D</th>
                                <th>Nomor SP2D</th>
                                <th>Nilai SP2D</th>
                                <th>Akun Pajak</th>
                                <th>Jenis Pajak</th>
                                <th>Nilai Pajak</th>
                                <th>E-Biling</th>
                                <th>NTPN</th>
                                <th>Status</th>
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

    </div>
</div>
<!-- </div> -->
</div>




@include('Penatausahaan.Pajakls.Modal.Tambah')
@include('Penatausahaan.Pajakls.Fungsi.Fungsi')
@endsection