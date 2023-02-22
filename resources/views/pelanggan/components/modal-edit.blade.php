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

                <input type="hidden" id="kode_pelanggan">
                <input type="hidden" id="no">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-pelanggan-edit"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Nomor Whatsapp</label>
                    <input type="text" class="form-control" id="no_wa_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no-wa-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat-edit"></div>
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

        let kode_pelanggan = $(this).data('id');
        let no = $(this).data('no');
        $('#no').val(no);
        //open modal

        $.ajax({
            url: `{{ route('pelanggan.index') }}`+'/' + kode_pelanggan +'/edit',
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                //fill data to form
                $('#kode_pelanggan').val(response.data.kode_pelanggan);
                $('#nama_pelanggan_edit').val(response.data.nama_pelanggan);
                $('#no_wa_edit').val(response.data.no_wa);
                $('#alamat_edit').val(response.data.alamat);

                //open modal
                $('#modal-edit').modal('show');
            }
        });
    });
    

    //action create post
    $('#update').click(function(e) {
        e.preventDefault();

        //define variable
        let kode_pelanggan = $('#kode_pelanggan').val();
        let namaPelanggan   = $('#nama_pelanggan_edit').val();
        let noWa = $('#no_wa_edit').val();
        let alamat = $('#alamat_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({

            url: `{{ route('pelanggan.index') }}`+'/' + kode_pelanggan,
            type: "PUT",
            cache: false,
            data: {
                "nama_pelanggan": namaPelanggan,
                "no_wa": noWa ,
                "alamat": alamat,
                "_token": token,
            },
            success:function(data){
                if($.isEmptyObject(data.error)){
                    Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${data.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                 //data pelanggan
                 let no = $('#no').val();
                 console.log(no);

                 let pelanggan = `
                    <tr>
                        <td>${data.data.nama_pelanggan}</td>
                        <td>${data.data.no_wa}</td>
                        <td>${data.data.alamat}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${data.data.kode_pelanggan}"  class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${data.data.kode_pelanggan}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to pelanggan data
                $(`#index_${data.data.kode_pelanggan}`).replaceWith(pelanggan);

                //close modal
                $('#modal-edit').modal('hide');
                }else{
                    console.log(data.error);
                    if(data.error.nama_pelanggan){
                        $('#alert-nama-pelanggan-edit').removeClass('d-none');
                        $('#alert-nama-pelanggan-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-nama-pelanggan-edit').html(data.error.nama_pelanggan);
                    }
                    else{
                        $('#alert-nama-pelanggan-edit').removeClass('d-block');
                        $('#alert-nama-pelanggan-edit').addClass('d-none');
                    }
                    
                    if(data.error.no_wa){
                        $('#alert-no-wa-edit').removeClass('d-none');
                        $('#alert-no-wa-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-no-wa-edit').html(data.error.no_wa);
                    }else{
                        $('#alert-no-wa-edit').removeClass('d-block');
                        $('#alert-no-wa-edit').addClass('d-none');
                    }

                    if(data.error.alamat){
                        $('#alert-alamat-edit').removeClass('d-none');
                        $('#alert-alamat-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-alamat-edit').html(data.error.alamat);
                    }else{
                        $('#alert-alamat-edit').removeClass('d-block');
                        $('#alert-alamat-edit').addClass('d-none');
                    }
                }
            },
        });

    });

</script>