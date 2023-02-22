<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        *{
            font-size : 10px;
        }
    </style>
</head>

<body>
    <div>
        <div class="row">
            <div class="col-md-8">
                <div class="p-3 bg-white rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="text-uppercase">Invoice</h1>
                            <div class="billed"><span class="font-weight-bold text-uppercase">Tanggal:</span><span
                                    class="ml-1"> {{$Transaksi->tanggal_transaksi}}</span></div>
                            <div class="billed"><span class="font-weight-bold text-uppercase">Kode
                                    Transaksi:</span><span class="ml-1">{{$Transaksi->kode_transaksi}}</span></div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Menu</th>
                                        <th>Jumlah</th>
                                        <th>SubTotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($DetailTransaksi as $d)
                                    <tr>
                                        <td>{{$d->menu->nama_menu}}</td>
                                        <td>{{$d->jumlah}}</td>
                                        <td>Rp {{ number_format($d->subtotal,2,',','.')}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <th>Total</th>
                                        <th>Rp {{ number_format($Transaksi->total,2,',','.')}}</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <th>Bayar</th>
                                        <th>Rp {{ number_format($Transaksi->bayar,2,',','.')}}</th>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <th>Kembali</th>
                                        <th>Rp {{ number_format($Transaksi->kembali,2,',','.')}}</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>