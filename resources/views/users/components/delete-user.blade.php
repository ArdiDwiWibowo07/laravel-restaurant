<script>
    //button create post event
    $('body').on('click', '#btn-delete-post', function () {

        let id = $(this).data('id');
        let token   = $("meta[name='csrf-token']").attr("content");
        console.log(id);

        Swal.fire({
            title: 'Apakah Kamu Yakin?',
            text: "ingin menghapus data ini!",
            icon: 'warning',
            showCancelButton: true,
            cancelButtonText: 'TIDAK',
            confirmButtonText: 'YA, HAPUS!'
        }).then((result) => {
            if (result.isConfirmed) {
                //fetch to delete data
                $.ajax({
                    type: 'DELETE',
                    url: `/users/delete/${id}`,
                    cache: false,
                    data: {
                        "_token": "{{ csrf_token() }}",
                        "id" : id
                    },
                    success:function(response){ 
                            if(response == true){
                                Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: 'Data Behasil Dihapus',
                                showConfirmButton: false,
                                timer: 3000
                            });

                        }
                        $(`#index_${id}`).remove();
                      
                        
                    }
                });

                
            }
        })
        
    });
</script>