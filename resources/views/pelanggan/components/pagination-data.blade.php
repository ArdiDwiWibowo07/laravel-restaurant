<div class="table-responsive">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Nama Pelanggan</th>
                <th>Nomor Whatsapp</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody id="result">
            @php $no = 1; @endphp
            @foreach($data as $d)
            <tr id="index_{{ $d->kode_pelanggan }}"> 
                <td>{{ $d->nama_pelanggan }}</td>
                <td>{{ $d->no_wa }}</td>
                <td>{{ $d->alamat }}</td>
                <td class="text-center">
                    <a href="javascript:void(0)" id="btn-edit-post" data-id="{{ $d->kode_pelanggan }}" data-no="{{ $no++}}" class="btn btn-primary btn-sm">EDIT</a>
                    <a href="javascript:void(0)" id="btn-delete-post" data-id="{{ $d->kode_pelanggan }}" class="btn btn-danger btn-sm">DELETE</a>
                </td>
                </tr>
            </tr>
        </tbody>
        @endforeach
    </table>
    {!! $data->links() !!}
</div>