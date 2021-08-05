<?php

namespace App\Http\Controllers;

use App\Models\Profil;
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
        $profil = Profil::latest()->paginate(5);
        
        return view ('profil.index',compact('profil'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**public function create()
    {
        return view('kamera.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'tempat'   => 'required',
            'ttl'   => 'required',
            'alamat'   => 'required',
            'content'   => 'required'
        ]);

        
        profil::create([
            'nama'     => $request->nama,
            'tempat'     => $request->tempat,
            'ttl'     => $request->ttl,
            'alamat'     => $request->alamat,
            'content'   => $request->content
            //$request->all()
            ]);
        return redirect()->route('profil.index')
            ->with ('success','Profil Berhasil Ditambahkan.');
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
   /* public function edit(profil $profil)
    {
        return view('profil.edit', compact('profil'));
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
        $request->validate([
            'nama'     => 'required',
            'tempat'   => 'required',
            'ttl'   => 'required',
            'alamat'   => 'required',
            'content'   => 'required'
        ]);
        
    //get data profil by ID
    $profil = Profil::where('id', $id)->first();
    if(!$profil)
            abort(404);
        
        $profil->nama = $request->nama;
        $profil->tempat     = $request->tempat;
        $profil->ttl     = $request->ttl;
        $profil->alamat   = $request->alamat;
        $profil->content   = $request->content;
        $profil->save();

        return redirect()->route('profil.index')
            ->with('success','Profil Berhasil Diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profil = Profil::where('id',$id)->first();
        if(!$profil)
            abort(404);
            
        $profil->delete();
        
        return redirect()->route('profil.index')
            ->with('success', 'Profil Berhasil Dihapus');
    }
}