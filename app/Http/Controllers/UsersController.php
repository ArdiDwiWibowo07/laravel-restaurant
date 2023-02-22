<?php

namespace App\Http\Controllers;

use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Users::paginate(5);
        $user = Auth::user();
        return view('users.index', compact('data','user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function fetch_data(Request $request)
    {
        $data = Users::where('nama', 'LIKE', '%' . $request->get('search') . '%')->paginate(5);
        return view('users.components.pagination-data', compact('data'))->render();
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
            'nama' => 'required',
            'email' => 'email:rfc,dns|required',
            'password' =>'required',
            'no_wa' => 'required|max:12',
            'username' => 'required'
        ]);



        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user = Users::create([
            'nama' =>$request->nama,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'no_wa' => $request->no_wa,
            'username' => $request->username
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan',
            'data' => $user,
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
    public function edit(Users $user)
    {
        //response
        return response()->json([
            'success' => true,
            'message' => 'Detail Data User',
            'data' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Users $user)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required',
            'email' => 'email:rfc,dns|required',
            'password' =>'required',
            'no_wa' => 'required|max:12',
            'username' => 'required'
        ]);


        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        }

        $user->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make( $request->password),
            'no_wa' => $request->no_wa,
            'username' => $request->username
        ]);

        
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Diupdate',
            'data' => $user,
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
        $deleted = Users::find($id)->delete();
        if($deleted){
            return true;
        }
    }
}
