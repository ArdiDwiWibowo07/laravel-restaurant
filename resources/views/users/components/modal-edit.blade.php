<!-- Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <input type="hidden" id="id">
                <input type="hidden" id="no">

                <div class="form-group">
                    <label for="name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama-edit"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Nomor Whatsapp</label>
                    <input type="text" class="form-control" id="no_wa_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no-wa-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="username_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-username-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email-edit"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="text" class="form-control" id="password_edit">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password-edit"></div>
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
            url: `{{ route('users.index') }}`+'/' + id +'/edit',
            type: "GET",
            cache: false,
            success:function(response){
                console.log(response);
                //fill data to form
                $('#id').val(response.data.id);
                $('#nama_edit').val(response.data.nama);
                $('#no_wa_edit').val(response.data.no_wa);
                $('#email_edit').val(response.data.email);
                $('#password_edit').val(response.data.password);
                $('#username_edit').val(response.data.username);

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
        console.log(id);
        let nama   = $('#nama_edit').val();
        console.log(nama);
        let noWa = $('#no_wa_edit').val();
        let userName = $('#username_edit').val();
        let email = $('#email_edit').val();
        let password = $('#password_edit').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        //ajax
        $.ajax({

            url: `{{ route('users.index') }}`+'/' + id,
            type: "PUT",
            cache: false,
            data: {
                "username" : userName,
                "no_wa": noWa,
                "nama": nama,
                "email": email,
                "password": password,
                "_token": token,
            },
            success:function(response){
                console.log(response);
                if($.isEmptyObject(response.error)){
                    Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                 
                //tambah row
                 let pelanggan = `
                    <tr>
                        <td>${response.data.nama}</td>
                        <td>${response.data.no_wa}</td>
                        <td>${response.data.username}</td>
                        <td>${response.data.email}</td>
                        <td class="text-center">
                            <a href="javascript:void(0)" id="btn-edit-post" data-id="${response.data.id}"  class="btn btn-primary btn-sm">EDIT</a>
                            <a href="javascript:void(0)" id="btn-delete-post" data-id="${response.data.id}" class="btn btn-danger btn-sm">DELETE</a>
                        </td>
                    </tr>
                `;
                
                //append to pelanggan data
                $(`#index_${response.data.id}`).replaceWith(pelanggan);

                //close modal
                $('#modal-edit').modal('hide');
                }else{
                    console.log(response.error.nama);
                    if(response.error.nama){
                        $('#alert-nama-edit').removeClass('d-none');
                        $('#alert-nama-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-nama-edit').html(response.error.nama);
                    }
                    else{
                        $('#alert-nama-edit').removeClass('d-block');
                        $('#alert-nama-edit').addClass('d-none');
                    }
                    
                    if(response.error.no_wa){
                        $('#alert-no-wa-edit').removeClass('d-none');
                        $('#alert-no-wa-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-no-wa-edit').html(response.error.no_wa);
                    }else{
                        $('#alert-no-wa-edit').removeClass('d-block');
                        $('#alert-no-wa-edit').addClass('d-none');
                    }

                    if(response.error.email){
                        $('#alert-email-edit').removeClass('d-none');
                        $('#alert-email-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-email-edit').html(response.error.email);
                    }else{
                        $('#alert-email-edit').removeClass('d-block');
                        $('#alert-email-edit').addClass('d-none');
                    }

                    if(response.error.password){
                        $('#alert-password-edit').removeClass('d-none');
                        $('#alert-password-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-password-edit').html(response.error.password);
                    }else{
                        $('#alert-password-edit').removeClass('d-block');
                        $('#alert-password-edit').addClass('d-none');
                    }

                    if(response.error.username){
                        $('#alert-username-edit').removeClass('d-none');
                        $('#alert-username-edit').addClass('d-block');
                        //add message to alert
                        $('#alert-username-edit').html(response.error.username);
                    }else{
                        $('#alert-username-edit').removeClass('d-block');
                        $('#alert-username-edit').addClass('d-none');
                    }
                }
            },
        });

    });

</script>