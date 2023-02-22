<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;
use PDF;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();
        $user = Auth::user();
        return view('laporan.index', compact('data','user'));
    }

    public function createPDF() {
        // retreive all records from db
        $data = Transaksi::all();
        // share data to view
        $pdf = PDF::loadView('pdf.transaksi', ['data'=>$data]);
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
      }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createPDFMonth() {
        $month = date('m');
        // retreive all records from db
        $data = Transaksi::whereMonth('tanggal_transaksi',$month)->get();
        // share data to view
        $pdf = PDF::loadView('pdf.transaksi', ['data'=>$data]);
        // download PDF file with download method
        return $pdf->stream('pdf_file.pdf');
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
