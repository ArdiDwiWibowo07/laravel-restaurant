<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>Nama Menu</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($data as $d)
        <tr id="index_{{ $d->id }}">
            <td>{{ $d->nama_menu }}</td>
            <td>{{ $d->harga_satuan}}
            <td>
                <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $d->id }}"
                    class="btn btn-primary btn-sm">EDIT</a>
                <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $d->id }}"
                    class="btn btn-danger btn-sm">DELETE</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>