<?php

namespace App\Http\Controllers\Api;

use App\Models\Profil;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profil = Profil::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Profil',
            'data' => $profil
        ], 200); //http status code sukses

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
    
        $profil = Profil::create([
            'nama'     => $request->nama,
            'tempat'     => $request->tempat,
            'ttl'   => $request->ttl,
            'alamat'     => $request->alamat,
            'content'     => $request->content
        ]);

        if($profil)
            {
                return response()->json([ 
                    'success' => true,
                    'message' => 'Profil berhasil di tambahkan',
                    'data' => $profil
                ], 200); //http status code sukses
            }else{
                return response()->json([
                'success' => false,
                'message' => 'profil gagal di tambahkan',
                'data' => $profil
            ], 409); //http status code conflict
    }
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profil = Profil::where('id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Detail data profil',
            'data' => $profil
        ], 200);
    }

    public function edit($id)
    {
                $profil = Profil::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'edit data profil',
                    'data' => $profil
                ], 200);
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
        
    //get data profil by ID
    $profil = Profil::find($id);

        $profil->update([
            'nama'     => $request->nama,
            'tempat'     => $request->tempat,
            'ttl'   => $request->ttl,
            'alamat'   => $request->alamat,
            'content'   => $request->content
        ]);

    if($profil){
        return response()->json([ 
            'success' => true,
            'message' => 'profil berhasil di update',
            'data' => $profil
        ], 200); //http status code sukses
    }else{
        return response()->json([
            'success' => false,
            'message' => 'profil gagal di update',
            'data' => $profil
        ], 409); //http status code conflict
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = profil::where('id',$id)->first();
            
        $profil->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Data profil',
            'data' => $profil, 
        ], 200);
    }
}