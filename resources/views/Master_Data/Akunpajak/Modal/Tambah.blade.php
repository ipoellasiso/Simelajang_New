<div class="modal fade" id="tambahakunpajak">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal">
                    <i class="anticon anticon-close"></i>
                </button>
            </div> -->
            <div class="modal-body">
            <form id="userForm" name="userForm" enctype="multipart/form-data">
                        <div class="modal-body">
                            <input type="hidden" name="id" id="id">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Akun Pajak</label>
                                        <input type="text" class="form-control" name="akun_pajak" id="akun_pajak" value="" placeholder="Akun Pajak ...." required>
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
