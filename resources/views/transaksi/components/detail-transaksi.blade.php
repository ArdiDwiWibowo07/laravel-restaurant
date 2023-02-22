<div class="table-responsive">
    <table class="table table-bordered ">
        <thead>
            <tr>
                <th>Menu</th>
                <th>Jumlah</th>
                <th>Sub Total</th>
            </tr>
        </thead>
        <tbody id="result">
            @foreach($data as $d)
            <tr id="index_{{ $d->kode_relasi }}"> 
                <td>{{ $d->menu->nama_menu }}</td>
                <td>{{ $d->jumlah }}</td>
                <td id="subTotal"> Rp {{ number_format($d->subtotal,2,',','.')}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>