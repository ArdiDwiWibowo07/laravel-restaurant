@include('theme')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 my-3">Transaksi</h1>
    <div class="row">
        <div class="col-xl-5 col-md-6 mb-4">
            <form>
                <input type="hidden" id="kode_transaksi" value="0">
                <div class="form-group">
                    <label for="exampleFormControlSelect1">Menu</label>
                    <select class="form-control" id="menu">
                        <option value="">Pilih Menu</option>
                        @foreach($menu as $m)
                        <option value="{{ $m->id }}">{{ $m->nama_menu }}</option>
                        @endforeach
                    </select>
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-menu"></div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Harga</label>
                    <input type="text" class="form-control" id="harga" placeholder="Harga" disabled>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" placeholder="Jumlah">
                    <div class="alert alert-danger mt-2 d-none" role="alert" id="alert-jumlah"></div>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Sub Total</label>
                    <input type="text" class="form-control" id="subtotal" placeholder="Subtotal" disabled>
                </div>

                <button type="submit" class="btn btn-primary" id="tambahPesan">Tambah Pesanan</button>
            </form>
        </div>

        <div class="col-xl-7 col-md-6 mb-4">
            <form>
                <div class="form-group">
                    <label for="exampleInputEmail1">Total Bayar</label>
                    <input type="text" class="form-control" id="totalBayar" placeholder="Total Bayar" disabled>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Bayar</label>
                    <input type="text" class="form-control" id="bayar" placeholder="Bayar">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Kembali</label>
                    <input type="text" class="form-control" id="kembali" placeholder="Kembali" disabled>
                </div>
                <button type="button" class="btn btn-primary mb-3" id="btnBayar">Bayar</button>
                <button type="button" class="btn btn-warning mb-3" id="btnReset">Cancel</button>
                <button type="button" class="btn btn-success mb-3" id="btnCetak" data-pembayaran="0">Cetak</button>
            </form>
            <div id="table_data">
                @include('transaksi.components.detail-transaksi')
            </div>
        </div>
    </div>
</div>
@include('footer')
@include('script')
<script>
    $(document).ready(function () {
        $('#menu').select2();
    });
</script>
<script>
    function rupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(angka);
    }

    let totDisplay = 0;
    $('#menu').change(function () {
        var menu = $(this).val();
        $.ajax({
            url: '/transaksi/get_harga?menu=' + menu,
            success: function (response) {
                if (response.data.length == 0) {
                    $('#alert-menu').removeClass('d-block');
                    $('#alert-menu').addClass('d-none');
                } else {
                    $('#harga').val(response.data[0].harga_satuan);
                    $('#alert-menu').removeClass('d-block');
                    $('#alert-menu').addClass('d-none');
                }
            }
        });
    });

    $('#jumlah').keyup(function () {
        var harga = $('#harga').val();
        var jumlah = $('#jumlah').val();
        if (jumlah !== '') {
            $('#alert-jumlah').removeClass('d-block');
            $('#alert-jumlah').addClass('d-none');
        }
        $('#subtotal').val(harga * jumlah);
    });


    $('#tambahPesan').click(function (e) {
        e.preventDefault();

        //Dekrasik variabel
        let kode_transaksi = $('#kode_transaksi').val();
        let menu = $('#menu').val();
        let harga = $('#harga').val();
        let jumlah = $('#jumlah').val();
        let subtotal = $('#subtotal').val();
        let token = $("meta[name='csrf-token']").attr("content");
        totDisplay = totDisplay + parseInt(subtotal);
        $('#totalBayar').val(rupiah(totDisplay));

        if (kode_transaksi == 0) {
            $.ajax({
                url: `{{ route('transaksi.index')}}`,
                type: "POST",
                cache: false,
                data: {
                    "kode_menu": menu,
                    "harga": harga,
                    "jumlah": jumlah,
                    "subtotal": subtotal,
                    "_token": token,
                },
                success: function (response) {
                    console.log(response);
                    if ($.isEmptyObject(response.error)) {
                        $('#kode_transaksi').val(response.data.kode_transaksi);
                        let kode_transaksi = $('#kode_transaksi').val();
                        console.log(kode_transaksi);
                        $.ajax({
                            url: "/transaksi/get_detail?kode_transaksi=" + kode_transaksi,
                            success: function (response) {
                                console.log(response);
                                $('#table_data').html(response);
                            }
                        });
                        $('#menu').val('');
                        $('#harga').val('');
                        $('#jumlah').val('');
                        $('#subtotal').val('');
                    } else {
                        if (response.error.kode_menu) {
                            console.log(response.error.kode_menu);
                            $('#alert-menu').removeClass('d-none');
                            $('#alert-menu').addClass('d-block');
                            //add message to alert
                            $('#alert-menu').html(response.error.kode_menu);
                        } else {
                            $('#alert-menu').removeClass('d-block');
                            $('#alert-menu').addClass('d-none');
                        }

                        if (response.error.jumlah) {
                            console.log(response.error.jumlah);
                            $('#alert-jumlah').removeClass('d-none');
                            $('#alert-jumlah').addClass('d-block');
                            //add message to alert
                            $('#alert-jumlah').html(response.error.jumlah);
                        } else {
                            $('#alert-jumlah').removeClass('d-block');
                            $('#alert-jumlah').addClass('d-none');
                        }
                    }
                }
            });
        } else {
            $('#alert-menu').removeClass('d-block');
            $('#alert-menu').addClass('d-none');
            let kode_transaksi = $('#kode_transaksi').val();
            $.ajax({
                url: `{{ route('transaksi.detail')}}`,
                type: "POST",
                cache: false,
                data: {
                    "kode_transaksi": kode_transaksi,
                    "kode_menu": menu,
                    "jumlah": jumlah,
                    "subtotal": subtotal,
                    "_token": token,
                },
                success: function (response) {
                    console.log(response);
                    if ($.isEmptyObject(response.error)) {
                        $.ajax({
                            url: "/transaksi/get_detail?kode_transaksi=" + kode_transaksi,
                            success: function (response) {
                                console.log(response);
                                $('#table_data').html(response);
                            }
                        });
                        $('#menu').val('');
                        $('#harga').val('');
                        $('#jumlah').val('');
                        $('#subtotal').val('');
                    } else {
                        if (response.error.kode_menu) {
                            console.log(response.error.kode_menu);
                            $('#alert-menu').removeClass('d-none');
                            $('#alert-menu').addClass('d-block');
                            //add message to alert
                            $('#alert-menu').html(response.error.kode_menu);
                        } else {
                            $('#alert-menu').removeClass('d-block');
                            $('#alert-menu').addClass('d-none');
                        }

                        if (response.error.jumlah) {
                            console.log(response.error.jumlah);
                            $('#alert-jumlah').removeClass('d-none');
                            $('#alert-jumlah').addClass('d-block');
                            //add message to alert
                            $('#alert-jumlah').html(response.error.jumlah);
                        } else {
                            $('#alert-jumlah').removeClass('d-block');
                            $('#alert-jumlah').addClass('d-none');
                        }
                    }
                }
            });

            //reset
        }
    });


</script>

<script>
    var bayar = document.getElementById("bayar");
    $('#bayar').keyup(function () {
        bayar.value = formatRupiah(this.value, "Rp. ");
        
    });

    function formatRupiah(angka, prefix) {
        var number_string = angka.replace(/[^,\d]/g, "").toString(),
            split = number_string.split(","),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        // tambahkan titik jika yang di input sudah menjadi angka ribuan
        if (ribuan) {
            separator = sisa ? "." : "";
            rupiah += separator + ribuan.join(".");
        }

        rupiah = split[1] != undefined ? rupiah + "," + split[1] : rupiah;
        return prefix == undefined ? rupiah : rupiah ? "Rp. " + rupiah : "";
    }

    // $('#total').click(function (e) {
    //     let subTotal = $("td#subTotal").text().split("  ").map(x => parseInt(x));
    //     console.log(subTotal);
    //     let total = subTotal.reduce((a, b) => a + b, 0);
    //     $('#totalBayar').val(rupiah(total.toString()));
    // });

    function rupiah(angka) {
        return new Intl.NumberFormat("id-ID", {
            style: "currency",
            currency: "IDR"
        }).format(angka);
    }


    function rupiahToIntInput(number) {
        const regex = /\W|_/g;
        return parseInt(number.substr(3).replace(regex, ''));
    }

    function rupiahToInt(number) {
        const regex = /\W|_/g;
        return parseInt(number.substr(3).replace(regex, '').slice(0, -2))
    }


    $('#btnBayar').click(function () {
        let total = $('#totalBayar').val();
        let bayar = $('#bayar').val();
        console.log(rupiahToIntInput(bayar));
        let kode_transaksi = $('#kode_transaksi').val();
        let token = $("meta[name='csrf-token']").attr("content");
        let kembali = rupiahToIntInput(bayar) - rupiahToInt(total);
        if (kembali < 0) {
            alert('Uang Kurang');

        } else {
            $.ajax({
                url: `{{ route('transaksi.index') }}` + '/' + kode_transaksi,
                type: 'PUT',
                cache: false,
                data: {
                    "kode_transaksi": kode_transaksi,
                    "total": rupiahToInt(total),
                    "bayar": rupiahToIntInput(bayar),
                    "kembali": kembali,
                    "_token": token,
                },
                success: function (response) {
                    console.log(response);
                    if ($.isEmptyObject(response.error)) {
                        console.log(response.data.kode_transaksi);
                        Swal.fire({
                            type: 'success',
                            icon: 'success',
                            title: `${response.message}`,
                            showConfirmButton: false,
                            timer: 3000
                        });

                        $('#btnCetak').data('pembayaran', response.data.kode_transaksi);
                        $("#result").empty();
                        $('#totalBayar').val('');
                        $('#bayar').val('');
                        $('#kode_transaksi').val('0');
                        $('#menu').val('');
                        $('#harga').val('');
                        $('#jumlah').val('');
                        $('#subtotal').val('');
                        $('#menu').val('');
                        $('#harga').val('');
                        $('#jumlah').val('');
                        $('#subtotal').val('');
                        $('#kode_transaksi').val('0');
                        totDisplay = 0;

                    }
                }
            });
        }
        $('#kembali').val(rupiah(kembali));

    });
    $('#btnReset').click(function () {
        let kode_transaksi = $('#kode_transaksi').val();
        $.ajax({
            type: 'DELETE',
            url: `/transaksi/${kode_transaksi}`,
            cache: false,
            data: {
                "_token": "{{ csrf_token() }}",
                "id": kode_transaksi
            },
            success: function (response) {
                console.log(response);
                if (response == true) {
                    $('#totalBayar').val('');
                    $('#bayar').val('');
                    $('#kode_transaksi').val('0');
                    $('#kembali').val('');
                    $("#result").empty();
                }
            }
        });
    });

    $('#btnCetak').click(function (e) {


        let pembayaran = $('#btnCetak').data('pembayaran');
        window.open(`/transaksi/invoice/${pembayaran}`);
    });



</script>

</body>

</html>