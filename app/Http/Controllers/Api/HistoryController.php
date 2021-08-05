<?php

    namespace App\Http\Controllers\Api;
    
    use App\Models\Pendidikan;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    
    class HistoryController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $history = Pendidikan::all();
    
            return response()->json([ // yang direturn atau dikembalikan berupa json
                'success' => true, 
                'message' => 'Daftar Data history',
                'data' => $history
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
            
        
            $history = Pendidikan::create([
                'jenjang'     => $request->jenjang,
                'sekolah'     => $request->sekolah,
                'tgl_masuk'   => $request->tgl_masuk,
                'tgl_lulus'     => $request->tgl_lulus
            ]);
    
            if($history)
                {
                    return response()->json([ 
                        'success' => true,
                        'message' => 'history berhasil di tambahkan',
                        'data' => $history
                    ], 200); //http status code sukses
                }else{
                    return response()->json([
                    'success' => false,
                    'message' => 'history gagal di tambahkan',
                    'data' => $history
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
            $history = Pendidikan::where('id', $id)->get();
    
            return response()->json([
                'success' => true,
                'message' => 'Detail data history',
                'data' => $history
            ], 200);
        }
    
        public function edit($id)
        {
                    $history = Pendidikan::where('id', $id)->first();
    
                    return response()->json([
                        'success' => true,
                        'message' => 'edit data history',
                        'data' => $history
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
            
        //get data history by ID
        $history = Pendidikan::find($id);
    
            $history->update([
                'jenjang'     => $request->jenjang,
                'sekolah'     => $request->sekolah,
                'tgl_masuk'   => $request->tgl_masuk,
                'tgl_lulus'   => $request->tgl_lulus
            ]);
    
        if($history){
            return response()->json([ 
                'success' => true,
                'message' => 'history berhasil di update',
                'data' => $history
            ], 200); //http status code sukses
        }else{
            return response()->json([
                'success' => false,
                'message' => 'history gagal di update',
                'data' => $history
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
            $history = Pendidikan::where('id',$id)->first();
                
            $history->delete();
            return response()->json([
                'success' => true,
                'message' => 'Berhasil Menghapus Data history',
                'data' => $history, 
            ], 200);
        }
    }