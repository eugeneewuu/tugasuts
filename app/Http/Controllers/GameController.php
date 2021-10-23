<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Game;
use Illuminate\Support\Facades\DB;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        $game = DB::table('game')->get();
        return view('admin.mahasiswa',['game' => $game]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Masukkan Data Anda";
        return view('admin.create',compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
        Kategori::create([
            'nama_game' => $request->nama_game,
            'nama_kategori' => $request->nama_kategori,

        ]);

        Game::create([
            'nama_game' => $request->nama_game,
            'platform_game' => $request->platform_game,
            'tahun_rilis' => $request->tahun_rilis,
            'nama_kategori' => $request->nama_kategori,


        ]);

        DB::commit();
        }catch (\Throwable $th) {

            //rollback jika terjadi kesalahan
            DB::rollback();
        }

        return redirect('/');
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
    public function edit($id)
    {
        $game = Game::find($id);
        $title = "Edit Data Anda";
        return view('admin.create',compact('title','game'));
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
        $message = [
            'required'=> 'Kolom : Attribute Harus Lengkap',
            'date'=> 'Kolom : Attribute Harus Lengkap',
            'numeric'=> 'Kolom : Attribute Harus Lengkap'
        ];
        $validasi=$request->validate([
         'nama_game'=> 'required',
         'platform_game'=> 'required',
         'tahun_rilis'=> 'required',
         'nama_kategori'=> 'required'
        ],$message);
        Game::where('id',$id)->update($validasi);
        return redirect('game')->with('success','Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Game::where('id',$id)->delete();
        return redirect('game')->with('success','Data Berhasil Di Hapus!');
    }
    public function cari(Request $request){

        $cari = $request->search;

        $game = Game::where('nama','like','%'.$cari.'%')->get();
        return view('admin.game', ['game' => $game]);
    }
}
