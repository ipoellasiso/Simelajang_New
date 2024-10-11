<script type="text/javascript">
    $(function () {

      /*------------------------------------------
       --------------------------------------------
       Pass Header Token
       --------------------------------------------
       --------------------------------------------*/
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

      /*------------------------------------------
      --------------------------------------------
      Render DataTable
      --------------------------------------------
      --------------------------------------------*/
    var table = $('.tabelpajaklstolak').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/tampilpajaklstolak",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nomor_spm', name: 'nomor_spm'},
            {data: 'tanggal_sp2d', name: 'tanggal_sp2d'},
            {data: 'nomor_sp2d', name: 'nomor_sp2d'},
            {data: 'nilai_sp2d', name: 'nilai_sp2d'},
            {data: 'akun_pajak', name: 'akun_pajak'},
            {data: 'jenis_pajak', name: 'jenis_pajak'},
            {data: 'nilai_pajak', name: 'nilai_pajak'},
            {data: 'ebilling', name: 'ebilling'},
            {data: 'ntpn', name: 'ntpn'},
            {data: 'status2', name: 'status2'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });

    // tambah data
    $('#createPajakls').click(function (){
        $('#saveBtn').val("create-pajakls");
        $('#id').val('');
        $('#userForm').trigger("reset");
        $('#tambahpajakls').modal('show');
        $('#modal-preview').attr('src', 'https://via/placeholder.com/150');

    });

    // edit data
    $('body').on('click', '.editPajakls', function()  {
        var iduser = $(this).data('id');
        $.get("/pajakls/edit/"+iduser, function (data) {
            $('#saveBtn').val("edit-pajakls");
            $('#tambahpajakls').modal('show');
            $('#id').val(data.id);
            $('#ebilling').val(data.ebilling);
            $('#ntpn').val(data.ntpn);
            $('#akun_ajak').val(data.akun_ajak);
            $('#jenis_pajak').val(data.jenis_pajak);
            $('#nilai_pajak').val(data.nilai_pajak);
            $('#rek_belanja').val(data.rek_belanja);
            $('#nama_npwp').val(data.nama_npwp);
            $('#nomor_npwp').val(data.nomor_npwp);

            $('#modal-preview').attr('alt', 'No image available');
            if(data.gambar){
                $('#modal-preview').attr('src','app/assets/images/bukti_pemby_pajak/'+data.bukti_pemby);
                $('#hidden_image').attr('src','app/assets/images/bukti_pemby_pajak/'+data.bukti_pemby);
            }
        })
    });

    // simpan data
    $('body').on('submit', '#userForm', function(e){
        e.preventDefault();

        var actionType = $('#saveBtn').val();
        $('#saveBtn').html('Menunggu Ya.....');

        var formData = new FormData(this);

        $.ajax({
            type:'POST',
            url: "/pajakls/store",
            data: formData,
            cacha: false,
            contentType: false,
            processData: false,
            success: (data) => {

                $('#userForm').trigger("reset");
                $('#tambahuser').modal('hide');
                $('#saveBtn').html('Simpan');

                Swal.fire({
                    icon: "success",
                    title: "success",
                    text: "Data Berhasil Disimpan"
                })

                table.draw();
            },
            error: function(data){
                console.log('Error:', data);
                $('saveBtn').html('Simpan');
            }
        });
    });

    // hapus data
    // $('body').on('click', '.deletePajakls', function () {

    //     var id = $(this).data("id");

    //     Swal.fire({
    //         title: 'Warning ?',
    //         text: "Hapus Data Ini ?"  +id,
    //         icon: 'warning',
    //         showCancelButton: true,
    //         confirmButtonColor: '#3085d6',
    //         cancelButtonColor: '#d33',
    //         confirmButtonText: 'Yes, Delete!'
    //     }).then((result) => {
    //         if (result.isConfirmed) {
    //             $.ajax({
    //                 type: "DELETE",
    //                 url: "/pajakls/destroy/"+id,
    //                 dataType: "JSON",
    //                 success: function(data)
    //                 {
    //                     Swal.fire({
    //                         icon: "success",
    //                         title: "Success",
    //                         text: data.success
    //                     })
    //                     table.draw();
    //                 },
    //             });
    //         }else {
    //             Swal.fire({
    //                 icon: "error",
    //                 title: "Error",
    //                 text: "Data Gagal Dihapus"
    //             })
    //         }
    //     })
    // });


    $('body').on('click', '.nonaktifPajaklstolak', function () {

    var id = $(this).data("id");

    Swal.fire({
        title: 'Warning ?',
        text: "Tolak Data Ini ?"+id,
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, Ditolak!'
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url: "/pajakls/tolak/"+id,
                dataType: "JSON",
                success: function(data)
                {
                    Swal.fire({
                        icon: "success",
                        title: "Success",
                        text: data.success
                    })
                    table.draw();
                },
            });
        }else {
            Swal.fire({
                icon: "error",
                title: "Error",
                text: "Data Gagal Ditolak"
            })
        }
    })
    });

    $('body').on('click', '.aktifPajaklstolak', function () {

    var id = $(this).data("id");

    Swal.fire({
    title: 'Warning ?',
    text: "Terima Data Ini ?"+id,
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Yes, Terima!'
    }).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "POST",
            url: "/pajakls/terima/"+id,
            dataType: "JSON",
            success: function(data)
            {
                Swal.fire({
                    icon: "success",
                    title: "Success",
                    text: data.success
                })
                table.draw();
            },
        });
    }else {
        Swal.fire({
            icon: "error",
            title: "Error",
            text: "Data Gagal Diterima"
        })
    }
    })
    });

});

function readURL(input, id) {
    id = id || '#modal-preview';
    if (input.files && input.files[0]){
        var reader = new FileReader();

        reader.onload = function (e) {
            $(id).attr('src', e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
        $('#modal-preview').removeClass('hidden');
        $('#start').hide();
    }
}

</script>

<script>
    function deleteData(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Yes, delete it!',
            cancelButtonText: 'No, cancel!',
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '/delete/' + id,
                    type: 'DELETE',
                    data: {
                        _token: '{{ csrf_token() }}'
                    },
                    success: function(response) {
                        Swal.fire(
                            'Deleted!',
                            'Your data has been deleted.',
                            'success'
                        );
                    },
                    error: function(response) {
                        Swal.fire(
                            'Error!',
                            'There was an error deleting your data.',
                            'error'
                        );
                    }
                });
            }
        });
    }
</script>   