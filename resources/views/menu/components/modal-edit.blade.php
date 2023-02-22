<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PELANGGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="id">
                <div class="form-group">
                    <label for="name" class="control-label">Nama Menu</label>
                    <input type="text" class="form-control" id="nama_menu_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-menu-edit"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Harga Satuan</label>
                    <input type="text" class="form-control" id="harga_satuan_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-harga-satuan-edit"></div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                <button type="button" class="btn btn-primary" id="update">UPDATE</button>
            </div>
        </div>
    </div>
</div>

<script>
    //button create post event
    $('body').on('click', '#btn-edit-post', function () {

        let id = $(this).data('id');
        //open modal

        $.ajax({
            url: `{{ route('menu.index') }}`+'/' + id +'/edit',
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                //fill data to form
                $('#id').val(response.data.id);
                $('#nama_menu_edit').val(response.data.nama_menu);
                $('#harga_satuan_edit').val(response.data.harga_satuan);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    

    //action create post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let id = $('#id').val();
        let namaMenu   = $('#nama_menu_edit').val();
        let hargaSatuan = $('#harga_satuan_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `{{ route('menu.index') }}`+'/' + id,
            type: "PUT",
            cache: false,
            data: {
                "nama_menu": namaMenu,
                "harga_satuan": hargaSatuan ,
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
                 //data pelanggan
                 let menu = `
                    <tr>
                        <td>${response.data.nama_menu}</td>
                        <td>${response.data.harga_satuan}</td>
                        <td class="">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}"  class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to pelanggan data
                $(`#index_${response.data.id}`).replaceWith(menu);

                //close modal
                $('#modal-edit').modal('hide');
                }else{
                    console.log(response.error);
                    if(response.error.nama_menu){
                        $('#alert-nama-menu-edit').removeClass('d-none');
                        $('#alert-nama-menu-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-nama-menu-edit').html(response.error.nama_menu);
                    }
                    else{
                        $('#alert-nama-menu-edit').removeClass('d-block');
                        $('#alert-nama-menu-edit').addClass('d-none');
                    }
                    
                    if(response.error.harga_satuan){
                        $('#alert-harga-satuan-edit').removeClass('d-none');
                        $('#alert-harga-satuan-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-harga-satuan-edit').html(response.error.harga_satuan);
                    }else{
                        $('#alert-harga-satuan-edit').removeClass('d-block');
                        $('#alert-harga-satuan-edit').addClass('d-none');
                    }
                }
            },
        });

    });

</script>