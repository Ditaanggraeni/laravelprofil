<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
//use App\Models\history;
use Illuminate\Http\Request;

class HistoryController extends Controller
{
    public function index()
    {
        $history = Pendidikan::latest()->paginate(5);

        return view ('history.index',compact('history'))
        ->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'jenjang' => 'required',
            'sekolah' => 'required',
            'tgl_masuk' => 'required',
            'tgl_lulus' => 'required',
        ]);

        
        Pendidikan::create([
            'jenjang'     => $request->jenjang,
            'sekolah'     => $request->sekolah,
            'tgl_masuk'     => $request->tgl_masuk,
            'tgl_lulus'     => $request->tgl_lulus
            //$request->all()
            ]);
        return redirect()->route('history.index')
            ->with ('success','History Berhasil Ditambahkan.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

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
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenjang'     => 'required',
            'sekolah'     => 'required',            
            'tgl_masuk'     => 'required',            
            'tgl_lulus'     => 'required'            

        ]);
        
    //get data profil by ID
    $history = Pendidikan::where('id', $id)->first();
    if(!$history)
            abort(404);
        
        $history->jenjang = $request->jenjang;
        $history->sekolah     = $request->sekolah;
        $history->tgl_masuk     = $request->tgl_masuk;
        $history->tgl_lulus     = $request->tgl_lulus;
        $history->save();

        return redirect()->route('history.index')
            ->with('success','History Berhasil Diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $history = Pendidikan::where('id',$id)->first();
        if(!$history)
            abort(404);
            
        $history->delete();
        
        return redirect()->route('history.index')
            ->with('success', 'history Berhasil Dihapus');
    }
}
