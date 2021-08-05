<?php

namespace App\Http\Controllers\Api;

use App\Models\Kontak;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kontak = Kontak::all();

        return response()->json([ // yang direturn atau dikembalikan berupa json
            'success' => true, 
            'message' => 'Daftar Data kontak',
            'data' => $kontak
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
        
        $kontak = Kontak::create([
            'no_tlp'     => $request->no_tlp,
            'email'     => $request->email,
            'ig'   => $request->ig
        ]);

        if($kontak)
            {
                return response()->json([ 
                    'success' => true,
                    'message' => 'kontak berhasil di tambahkan',
                    'data' => $kontak
                ], 200); //http status code sukses
            }else{
                return response()->json([
                'success' => false,
                'message' => 'kontak gagal di tambahkan',
                'data' => $kontak
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
        $kontak = Kontak::where('id', $id)->get();

        return response()->json([
            'success' => true,
            'message' => 'Detail data kontak',
            'data' => $kontak
        ], 200);
    }

    public function edit($id)
    {
                $kontak = Kontak::where('id', $id)->first();

                return response()->json([
                    'success' => true,
                    'message' => 'edit data kontak',
                    'data' => $kontak
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
        
    //get data kontak by ID
    $kontak = Kontak::find($id);

        $kontak->update([
            'no_tlp'     => $request->no_tlp,
            'email'     => $request->email,
            'ig'   => $request->ig
        ]);

    if($kontak){
        return response()->json([ 
            'success' => true,
            'message' => 'kontak berhasil di update',
            'data' => $kontak
        ], 200); //http status code sukses
    }else{
        return response()->json([
            'success' => false,
            'message' => 'kontak gagal di update',
            'data' => $kontak
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
        $kontak = Kontak::where('id',$id)->first();
            
        $kontak->delete();
        return response()->json([
            'success' => true,
            'message' => 'Berhasil Menghapus Data kontak',
            'data' => $kontak, 
        ], 200);
    }
}