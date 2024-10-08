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
    var table = $('#data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "/tarikpajaksipdri",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nomor_sp2d', name: 'nomor_sp2d'},
            {data: 'tanggal_sp2d', name: 'tanggal_sp2d'},
            {data: 'nama_skpd', name: 'nama_skpd'},
            {data: 'keterangan_sp2d', name: 'keterangan_sp2d'},
            {data: 'nilai_sp2d', name: 'nilai_sp2d'},
            {data: 'nomor_spm', name: 'nomor_spm'},
        ]
    });

});

</script>