<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pelanggan::paginate(5);
        return view('pelanggan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function fetch_data(Request $request)
    {
        $data = Pelanggan::where('nama_pelanggan', 'LIKE', '%' . $request->get('search') . '%')
        ->paginate(5);
            return view('pelanggan.components.pagination-data', compact('data'))->render();
    }
    public function search(Request $request)
    {
        $data = Pelanggan::where('nama_pelanggan', 'LIKE', '%' . $request->get('search') . '%')
            ->paginate(5);
        return view('pelanggan.components.pagination-data', compact('data'))->render();
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = date('Y-m-d', time());
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'no_wa' => 'required|max:12',
            'alamat' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

            $pelanggan = Pelanggan::create([
                'tanggal_daftar' => $date,
                'nama_pelanggan' => $request->nama_pelanggan,
                'no_wa' => $request->no_wa,
                'alamat' => $request->alamat
            ]);

            //return response
            return response()->json([
                'success' => true,
                'message' => 'Data Berhasil Disimpan!',
                'data' => $pelanggan,
            ]);
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
    public function edit(Pelanggan $pelanggan)
    {
        //response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Pelanggan',
            'data' => $pelanggan
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pelanggan $pelanggan)
    {
        //validasi 
        $validator = Validator::make($request->all(), [
            'nama_pelanggan' => 'required',
            'no_wa' => 'required|max:12',
            'alamat' => 'required',
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        //update
        $pelanggan->update([
            'nama_pelanggan' => $request->nama_pelanggan,
            'no_wa' => $request->no_wa,
            'alamat' => $request->alamat
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate!',
            'data' => $pelanggan
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
        $deleted = Pelanggan::find($id)->delete();
        if($deleted){
            return true;
        }
    }
}