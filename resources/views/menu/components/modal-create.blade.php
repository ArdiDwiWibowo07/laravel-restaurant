<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH MENU</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-menu"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Harga Satuan</label>
                    <input type="number" class="form-control" id="harga_satuan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga-satuan"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="store">SIMPAN</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-create-post', function () {

        //open modal
        $('#modal-create').modal('show');
    });

    //action create post
    $('#store').click(function(e) {
        e.preventDefault();

        //define variable
        let namaMenu   = $('#nama_menu').val();
        let hargaSatuan = $('#harga_satuan').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: `{{ route('menu.index') }}`,
            type: "POST",
            cache: false,
            data: {
                "nama_menu": namaMenu,
                "harga_satuan": hargaSatuan,
                "_token": token,
            },
            success:function(response){
               
                if($.isEmptyObject(response.error)){
                    Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });

                $.ajax({
                    url:"/menu/fetch_data",
                    success:function(data)
                    {
                        console.log(data);
                        $('#table_data').html(data);
                    }
                });


                //clear form
                $('#nama_menu').val('');
                $('#harga_satuan').val('');

                //close modal
                $('#modal-create').modal('hide');
                }else{
                    console.log(response.error);
                    if(response.error.nama_menu){
                        $('#alert-nama-menu').removeClass('d-none');
                        $('#alert-nama-menu').addClass('d-block');
                        //add message to alert
                        $('#alert-nama-menu').html(response.error.nama_menu);
                    }
                    else{
                        $('#alert-nama-menu').removeClass('d-block');
                        $('#alert-nama-menu').addClass('d-none');
                    }
                    
                    if(response.error.harga_satuan){
                        $('#alert-harga-satuan').removeClass('d-none');
                        $('#alert-harga-satuan').addClass('d-block');
                        //add message to alert
                        $('#alert-harga-satuan').html(response.error.harga_satuan);
                    }else{
                        $('#alert-harga-satuan').removeClass('d-block');
                        $('#alert-harga-satuan').addClass('d-none');
                    }
                }
            },
        });

    });

</script>