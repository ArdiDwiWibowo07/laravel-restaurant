<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
            return $hasil_rupiah; 
        }

        $date = date('Y-m-d', time());
        $jumlahMenu = DB::table('menu')->count();
        $rataTransaksi = DB::table('transaksi')->avg('total');
        $rpRataTransaksi = rupiah($rataTransaksi);
        $penjualanHariIni = DB::table('transaksi')->where('tanggal_transaksi', $date)->sum('total');
        $rpPenjualanHariIni = rupiah($penjualanHariIni);
        // $transaksi = DB::table('transaksi')->get();
        $transaksi = DB::table('transaksi')->groupByRaw('month')->selectRaw('year(tanggal_transaksi) year, monthname(tanggal_transaksi) month, sum(total) as total')->orderBy('tanggal_transaksi')->get();
        $transaksiTotal = [];
        foreach($transaksi as $t){
            $transaksiTotal['total'][] = (int) $t->total;
        }    
        $data['chart_data'] = json_encode($transaksiTotal);
        $menuFavorite = DB::table('detailtransaksi')->join('menu', 'detailtransaksi.kode_menu', '=', 'menu.id')->select('nama_menu', DB::raw('count("*") as total'))->groupBy('nama_menu')->limit(3)->get();
        $menuFavoriteData = [];
        foreach($menuFavorite as $menu){
            $menuFavoriteData['nama_menu'][] = $menu->nama_menu;
            $menuFavoriteData['total'][] = $menu->total;
        }
        $dataMenu = json_encode($menuFavoriteData);
        $user = Auth::user();
        return view('dashboard', compact('jumlahMenu','rpRataTransaksi', 'rpPenjualanHariIni','data','dataMenu','menuFavoriteData','user'));
        // return response()->json([
        //     'success' => true,
        //     'message' => 'Data',
        //     'data' => $jumlahMenu
        // ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
