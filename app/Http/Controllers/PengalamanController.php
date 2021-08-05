<?php

namespace App\Http\Controllers;

use App\Models\Pengalaman;
use Illuminate\Http\Request;

class PengalamanController extends Controller
{
    public function index()
    {
        $pengalaman = Pengalaman::latest()->paginate(5);
        
        return view ('pengalaman.index',compact('pengalaman'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'deskripsi'=> 'required',
        ]);

        Pengalaman::create($request->all());
        return redirect()->route('pengalaman.index')
            ->with ('success','Data Pengalaman Berhasil Ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'posisi' => 'required',
            'perusahaan' => 'required',
            'deskripsi'=> 'required',
        ]);
        
        $pengalaman = Pengalaman::where('id', $id)->first();
        if(!$pengalaman)
            abort(404);

        $pengalaman->posisi = $request->posisi;
        $pengalaman->perusahaan = $request->perusahaan;
        $pengalaman->deskripsi = $request->deskripsi;
        $pengalaman->save();

        return redirect()->route('pengalaman.index')
            ->with('success','Data Pengalaman Berhasil Diedit.');
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
        if(!$pengalaman)
            abort(404);
            
        $pengalaman->delete();
        
        return redirect()->route('pengalaman.index')
            ->with('success', 'Pengalaman Berhasil Dihapus' );
    }
}
