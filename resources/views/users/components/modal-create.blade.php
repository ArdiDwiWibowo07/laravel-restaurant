<!-- Modal -->
<div class="modal fade" id="modal-create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">TAMBAH USER</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <label for="name" class="control-label">Nama</label>
                    <input type="text" class="form-control" id="nama">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-nama"></div>
                </div>
                

                <div class="form-group">
                    <label for="name" class="control-label">Nomor Whatsapp</label>
                    <input type="text" class="form-control" id="no_wa">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-no-wa"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Username</label>
                    <input type="text" class="form-control" id="username">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-username"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Email</label>
                    <input type="text" class="form-control" id="email">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-email"></div>
                </div>

                <div class="form-group">
                    <label for="name" class="control-label">Password</label>
                    <input type="password" class="form-control" id="password">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-password"></div>
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
        let nama   = $('#nama').val();
        let noWa = $('#no_wa').val();
        let userName = $('#username').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let token   = $("meta[name='csrf-token']").attr("content");
        
        //ajax
        $.ajax({
            url: `/users`,
            type: "POST",
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
                console.log(response.result);
                $.ajax({
                    url:"/users/fetch_data",
                    success:function(data){
                        console.log(data);
                        $('#table_data').html(data);
                    }
                });
                
                if($.isEmptyObject(response.error)){
                    Swal.fire({
                    type: 'success',
                    icon: 'success',
                    title: `${response.message}`,
                    showConfirmButton: false,
                    timer: 3000
                });
                
                $.ajax({
                    url:'/users/fetch_data',
                    success:function(data)
                    {
                        console.log(data);
                        $('#table_data').html(data);
                    }
                });
                //clear form
                $('#nama_pelanggan').val('');
                $('#no_wa').val('');
                $('#alamat').val('');
                //close modal
                $('#modal-create').modal('hide');
                }else{
                    console.log(response.error);
                    if(response.error.nama){
                        $('#alert-nama').removeClass('d-none');
                        $('#alert-nama').addClass('d-block');
                        //add message to alert
                        $('#alert-nama').html(response.error.nama);
                    }
                    else{
                        $('#alert-nama').removeClass('d-block');
                        $('#alert-nama').addClass('d-none');
                    }
                    
                    if(response.error.no_wa){
                        $('#alert-no-wa').removeClass('d-none');
                        $('#alert-no-wa').addClass('d-block');
                        //add message to alert
                        $('#alert-no-wa').html(response.error.no_wa);
                    }else{
                        $('#alert-no-wa').removeClass('d-block');
                        $('#alert-no-wa').addClass('d-none');
                    }

                    if(response.error.email){
                        $('#alert-email').removeClass('d-none');
                        $('#alert-email').addClass('d-block');
                        //add message to alert
                        $('#alert-email').html(response.error.email);
                    }else{
                        $('#alert-email').removeClass('d-block');
                        $('#alert-email').addClass('d-none');
                    }

                    if(response.error.password){
                        $('#alert-password').removeClass('d-none');
                        $('#alert-password').addClass('d-block');
                        //add message to alert
                        $('#alert-password').html(response.error.password);
                    }else{
                        $('#alert-password').removeClass('d-block');
                        $('#alert-password').addClass('d-none');
                    }

                    if(response.error.username){
                        $('#alert-username').removeClass('d-none');
                        $('#alert-username').addClass('d-block');
                        //add message to alert
                        $('#alert-username').html(response.error.username);
                    }else{
                        $('#alert-username').removeClass('d-block');
                        $('#alert-username').addClass('d-none');
                    }
                }
            },
        });

    });

</script>