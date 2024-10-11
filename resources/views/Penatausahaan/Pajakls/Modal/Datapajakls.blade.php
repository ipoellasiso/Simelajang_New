<div class="modal fade bd-example-modal-xl" >
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title h4">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div>
            <div class="modal-body">
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
                            <table id="data-table3" class="tabelpajaklssipdri table table-hover">
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
                                        <th></th>
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
    </div>
</div>