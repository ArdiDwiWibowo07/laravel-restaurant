<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Data Pelanggan</title>
    <style>
    body {
            background-color: lightgray !important;
        }

    </style>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body style="background: lightgray">

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                <a href="javascript:void(0)" class="btn btn-success mb-2" id="btn-create-post">TAMBAH</a>
                        <input  class="typeahead form-control my-2" id="search" type="text" placeholder="Cari">
                        <div id="table_data">
                            @include('pelanggan.components.pagination-data')
                        </div>
                        <input type="hidden" name="hidden_page" id="hidden_page" value="1" />
                        <!-- <table class="table table-bordered ">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Nama Pelanggan</th>
                                    <th>Nomor Whatsapp</th>
                                    <th>Alamat</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody id="result"></tbody>
                        </table> -->
                </div>
            </div>
        </div>
    </div>
    @include('pelanggan.components.modal-create')
    @include('pelanggan.components.modal-edit')
    @include('pelanggan.components.delete-pelanggan')
    <script>
    $(document).ready(function(){

        $('#search').keyup(function(){
            var search = $('#search').val();
            var page = $('#hidden_page').val();
            fetch_data(page, search);
            });

    $(document).on('click', '.pagination a', function(event){
    event.preventDefault(); 
    var page = $(this).attr('href').split('page=')[1];
    var search = $('#search').val();
    
    fetch_data(page, search);
    });

    function fetch_data(page, search)
    {
    $.ajax({
    url:"/pelanggan/fetch_data?page="+page+"&search="+search,
    success:function(data)
    {
        $('#table_data').html(data);
    }
    });
    }
    
    });
    </script>
    

</body>
</html>