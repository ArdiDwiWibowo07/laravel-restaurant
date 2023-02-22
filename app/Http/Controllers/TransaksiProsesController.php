<?php

namespace App\Http\Controllers;
use App\Models\DetailTransaksi;
use App\Models\Menu;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiProsesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [];
        $menu = Menu::all();
        $user = Auth::user();
        return view('transaksi.index', compact('menu', 'data','user'));
    }

    public function getHarga(Request $request){
        $data = Menu::where('id', $request->get('menu'))->get();
        return response()->json([
            'success' => true,
            'message' => 'Data Harga',
            'data' => $data
        ]);
    }

    public function getDetail(Request $request)
    {
        $data = DetailTransaksi::where('kode_transaksi', $request->get('kode_transaksi'))->get();
        return view('transaksi.components.detail-transaksi', compact('data'))->render();
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function invoice($id)
    {
        $Transaksi = Transaksi::where('kode_transaksi', $id)->firstOrFail();
        $DetailTransaksi = DetailTransaksi::where('kode_transaksi', $id)->get();

        //b6
        $customPaper =array(0,0,354.33,498.90);
        $pdf = PDF::loadView('transaksi.components.invoice',compact('Transaksi','DetailTransaksi'))->setPaper($customPaper, 'portrait');
        return $pdf->stream('pdf_file.pdf');

        // return view('transaksi.components.invoice');
    }
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
        $validator = Validator::make($request->all(), [
            'kode_menu' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $date = date('Y-m-d', time());
        $user_id = 1;
        $total = 0;
        $transaksi = Transaksi::create([
            'user_id' => $user_id,
            'tanggal_transaksi' => $date,
            'total' => $total 
        ]);

        DetailTransaksi::create([
            'kode_transaksi' => $transaksi->kode_transaksi,
            'kode_menu' => $request->kode_menu,
            'jumlah' => $request->jumlah,
            'subtotal' => $request->subtotal 
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $transaksi,
        ]);
    }

    public function storeDetail(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_menu' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $detail ='';
        try {
            $detail = DetailTransaksi::create([
                'kode_transaksi' => $request->kode_transaksi,
                'kode_menu' => $request->kode_menu,
                'jumlah' => $request->jumlah,
                'subtotal' => $request->subtotal 
            ]);
        } catch (Exception $e) {
            $e->getMessage();
            $detail =  $e->getMessage();
        }
  
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $detail,
        ]);

    }

    public function update(Request $request, Transaksi $transaksi){
        //response
        
        $transaksi->update([
            'total' => $request->total,
            'bayar' => $request->bayar,
            'kembali' => $request->kembali
        ]);
        
        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data' => $transaksi
        ]);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //    response
        $transaksi->update([
            'total' => '2'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data' => $transaksi
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        DetailTransaksi::where('kode_transaksi', $id)->delete();
        $deleted = Transaksi::find($id)->delete();       
        if($deleted){
            return true;
        }
    }
}
