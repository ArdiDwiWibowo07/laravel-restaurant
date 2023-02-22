<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH PELANGGAN</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama_pelanggan">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-pelanggan"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Nomor Whatsapp</label>
                    <input type="text" class="form-control" id="no_wa">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no-wa"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Alamat</label>
                    <input type="text" class="form-control" id="alamat">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-alamat"></div>
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
        let namaPelanggan   = $('#nama_pelanggan').val();
        let noWa = $('#no_wa').val();
        let alamat = $('#alamat').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: `{{ route('pelanggan.index') }}`,
            type: "POST",
            cache: false,
            data: {
                "nama_pelanggan": namaPelanggan,
                "no_wa": noWa ,
                "alamat": alamat,
                "_token": token,
            },
            success:function(data){
                console.log(data.result);
                if($.isEmptyObject(data.error)){
                    Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${data.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                 //data pelanggan
                 let number = parseInt($("td#num:last").text());
                 console.log(number);

                 let pelanggan = `
                    <tr>
                        <td>${number}</td>
                        <td>${data.data.nama_pelanggan}</td>
                        <td>${data.data.no_wa}</td>
                        <td>${data.data.alamat}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${data.data.kode_pelanggan}" class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${data.data.kode_pelanggan}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to table
                $('#result').append(pelanggan);

                //clear form
                $('#nama_pelanggan').val('');
                $('#no_wa').val('');
                $('#alamat').val('');
                //close modal
                $('#modal-create').modal('hide');
                }else{
                    console.log(data.error);
                    if(data.error.nama_pelanggan){
                        $('#alert-nama-pelanggan').removeClass('d-none');
                        $('#alert-nama-pelanggan').addClass('d-block');
                        //add message to alert
                        $('#alert-nama-pelanggan').html(data.error.nama_pelanggan);
                    }
                    else{
                        $('#alert-nama-pelanggan').removeClass('d-block');
                        $('#alert-nama-pelanggan').addClass('d-none');
                    }
                    
                    if(data.error.no_wa){
                        $('#alert-no-wa').removeClass('d-none');
                        $('#alert-no-wa').addClass('d-block');
                        //add message to alert
                        $('#alert-no-wa').html(data.error.no_wa);
                    }else{
                        $('#alert-no-wa').removeClass('d-block');
                        $('#alert-no-wa').addClass('d-none');
                    }

                    if(data.error.alamat){
                        $('#alert-alamat').removeClass('d-none');
                        $('#alert-alamat').addClass('d-block');
                        //add message to alert
                        $('#alert-alamat').html(data.error.alamat);
                    }else{
                        $('#alert-alamat').removeClass('d-block');
                        $('#alert-alamat').addClass('d-none');
                    }
                }
            },
        });

    });

</script>