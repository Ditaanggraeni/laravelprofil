<?php

namespace App\Http\Controllers\Api;

use App\Models\Pengalaman;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pengalaman = Pengalaman::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data Pengalaman Kerja',
            'data' => $pengalaman
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
        /**$this->validate($request, [
            'image'     => 'required|image|mimes:png,jpg,jpeg',
            'kategori_id'   => 'required',
            'merk'     => 'required',
            'harga'   => 'required'
        ]);*/
        
    
        $pengalaman = Pengalaman::create([
            'posisi'     => $request->posisi,
            'perusahaan'     => $request->perusahaan,
            'deskripsi'   => $request->deskripsi
        ]);

        if($pengalaman)
            {
                return response()->json([ 
                    'success' => true,
                    'message' => 'Pengalaman berhasil di tambahkan',
                    'data' => $pengalaman
                ], 200); //http status code sukses
            }else{
                return response()->json([
                'success' => false,
                'message' => 'Pengalaman gagal di tambahkan',
                'data' => $pengalaman
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
        $pengalaman = Pengalaman::where('id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Detail data pengalaman',
            'data' => $pengalaman
        ], 200);
    }

    public function edit($id)
    {
                $pengalaman = Pengalaman::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'edit data pengalaman',
                    'data' => $pengalaman
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
        /**$this->validate($request, [
            'merk'     => 'required',
            'harga'   => 'required',
            'kategori_id'   => 'required'
        ]);*/
        
    //get data pengalaman by ID
    $pengalaman = Pengalaman::find($id);

        $pengalaman->update([
            'posisi'     => $request->posisi,
            'perusahaan'     => $request->perusahaan,
            'deskripsi'   => $request->deskripsi
        ]);

    if($pengalaman){
        return response()->json([ 
            'success' => true,
            'message' => 'Pengalaman berhasil di update',
            'data' => $pengalaman
        ], 200); //http status code sukses
    }else{
        return response()->json([
            'success' => false,
            'message' => 'Pengalaman gagal di update',
            'data' => $pengalaman
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
        $pengalaman = Pengalaman::where('id',$id)->first();
            
        $pengalaman->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Data pengalaman',
            'data' => $pengalaman, 
        ], 200);
    }
}