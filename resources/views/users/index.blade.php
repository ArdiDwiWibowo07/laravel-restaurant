@include('theme')
<div class="container mt-5">
    <h1 class="h3 mb-2 text-gray-800 mb-4">Data Master Users</h1>
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <a href="javascript:void(0)" class="btn btn-success" id="btn-create-post">TAMBAH</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive" id="table_data">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Nomor Whatsapp</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr id="index_{{ $d->id }}">
                                    <td>{{ $d->nama }}</td>
                                    <td>{{ $d->no_wa }}</td>
                                    <td>{{ $d->username }}</td>
                                    <td>{{ $d->email}}
                                    <td class="text-center">
                                        <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $d->id }}"
                                            class="btn btn-primary btn-sm">EDIT</a>
                                        <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $d->id }}"
                                            class="btn btn-danger btn-sm">DELETE</a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>
@include('users.components.modal-create')
@include('users.components.modal-edit')
@include('users.components.delete-user')
@include('footer')
@include('script')

<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>


</body>

</html>