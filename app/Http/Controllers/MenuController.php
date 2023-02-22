<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Menu::all();
        $user = Auth::user();
        
       
        return view('menu.index', compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch_data(){
        $data = Menu::all();
        return view('menu.components.pagination-data', compact('data'))->render();
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
            'nama_menu' => 'required',
            'harga_satuan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $menu = Menu::create([
            'nama_menu' => $request->nama_menu,
            'harga_satuan' => $request->harga_satuan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Behasil Ditambah',
            'data' => $menu,
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
    public function edit(Menu $menu)
    {
        //response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data Menu',
            'data' => $menu
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $validator = Validator::make($request->all(), [
            'nama_menu' => 'required',
            'harga_satuan' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $menu->update([
            'nama_menu' => $request->nama_menu,
            'harga_satuan' => $request->harga_satuan
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Behasil Ditambah',
            'data' => $menu,
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
        $deleted = Menu::find($id)->delete();
        if ($deleted) {
            return true;
        }
    }
}
