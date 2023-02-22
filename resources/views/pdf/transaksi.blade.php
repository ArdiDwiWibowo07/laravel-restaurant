<!DOCTYPE html>
<html>

<head>
    <title>Laporan Transaksi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9px;
        }
    </style>
    <center>
        <h5>Laporan Transaksi</h4>
    </center>

    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;?>
                @foreach($data as $d)
                <tr>
                    <td>
                        <?php echo $no; $no++; ?>
                    <td>{{ $d->tanggal_transaksi }}</td>
                    <td>Rp {{ number_format($d->total,2,',','.')}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

</body>

</html>