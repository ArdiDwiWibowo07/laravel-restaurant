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