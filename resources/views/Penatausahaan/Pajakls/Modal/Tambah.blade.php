<div class="modal fade bd-example-modal-xl" id="tambahpajakls">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <h5 class="modal-title h4">Extra large modal</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div> --}}
            <div class="modal-body">
                <form id="userForm" name="userForm" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">
                        <div class="row">
                            <div class="form-row col-12">
                                <div class="form-group col-md-6">
                                    <label>Pilih Pajak</label>
                                    <button class="btn btn-tone btn-primary">
                                        <i class="anticon anticon-sync" data-toggle="modal" data-target=".bd-example-modal-xl" data-dismiss="modal"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="form-row col-12">
                                <div class="form-group col-md-6">
                                    <label>Nama OPD</label>
                                    <input type="text" class="form-control" name="nama_opd" id="nama_opd" value="" placeholder="Nama OPD ...." required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Bendahara</label>
                                    <input type="text" class="form-control" name="nama_bendahara" id="nama_bendahara" value="" placeholder="Nama Bendahara ...." required>
                                </div>
                            </div>
                            <div class="form-row col-12">
                                <div class="form-group col-md-6">
                                    <label>Nama OPD</label>
                                    <input type="text" class="form-control" name="nama_opd" id="nama_opd" value="" placeholder="Nama OPD ...." required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Bendahara</label>
                                    <input type="text" class="form-control" name="nama_bendahara" id="nama_bendahara" value="" placeholder="Nama Bendahara ...." required>
                                </div>
                            </div>
                            <div class="form-row col-12">
                                <div class="form-group col-md-6">
                                    <label>Nama OPD</label>
                                    <input type="text" class="form-control" name="nama_opd" id="nama_opd" value="" placeholder="Nama OPD ...." required>
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Nama Bendahara</label>
                                    <input type="text" class="form-control" name="nama_bendahara" id="nama_bendahara" value="" placeholder="Nama Bendahara ...." required>
                                </div>
                            </div>
                            
                            <div class="form-row col-12">
                                <div class="form-group col-md-6">
                                    <label>Upload Foto</label>
                                    <input type="file" class="form-control" name="gambar" id="gambar" accept="image/*" onchange="readURL(this);">
                                    <input type="hidden" name="hidden_image" id="hidden_image">
                                    <small>Upload Foto Harus Format JPG,JPEG / PNS dan Max File 5MB </small>
                                </div>
                                <div class="form-group col-md-6">
                                    <img id="modal-preview" src="https://via/placeholder.com/150" alt="Preview" class="form-group hidden" width="100" height="100">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            <i class="fa fa-save"></i> Close
                        </button>
                        <button type="submit" id="saveBtn" value="create" class="btn btn-secondary">
                            <i class="fa fa-save"></i>  Simpan
                        </button>
    
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

