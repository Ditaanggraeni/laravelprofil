<?php

namespace App\Http\Controllers;

use App\Models\Kontak;
use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index()
    {
        $kontak = Kontak::latest()->paginate(5);
        
        return view ('kontak.index',compact('kontak'))
        ->with('i',(request()->input('page',1)-1)*5);
    }
    public function store(Request $request)
    {
        $request->validate([
            'no_tlp' => 'required',
            'email' => 'required',
            'ig'=> 'required',
        ]);

        Kontak::create($request->all());
        return redirect()->route('kontak.index')
            ->with ('success','Data kontak Berhasil Ditambahkan.');
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_tlp' => 'required',
            'email' => 'required',
            'ig'=> 'required',
        ]);
        
        $kontak = Kontak::where('id', $id)->first();
        if(!$kontak)
            abort(404);

        $kontak->no_tlp = $request->no_tlp;
        $kontak->email = $request->email;
        $kontak->ig = $request->ig;
        $kontak->save();

        return redirect()->route('kontak.index')
            ->with('success','Data kontak Berhasil Diedit.');
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
        if(!$kontak)
            abort(404);
            
        $kontak->delete();
        
        return redirect()->route('kontak.index')
            ->with('success', 'kontak Berhasil Dihapus' );
    }
}
