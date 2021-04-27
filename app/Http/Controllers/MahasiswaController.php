<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   $mahasiswa=Mahasiswa::all();

        $title = "Data Mahasiswa";
        return view('admin.mahasiswa',compact('title','mahasiswa'));

        if($request->has('cari')){
            $mahasiswa = Mahasiswa::where('nama','LIKE', '%'.$request->cari.'%')->get();
        }
        else{
            $mahasiswa = Mahasiswa::all();
            }

           return view('admin.mahasiswa', ['mahasiswa' => $mahasiswa]);
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
       $message = [
           'required'=> 'Kolom : Attribute Harus Lengkap',
           'date'=> 'Kolom : Attribute Harus Lengkap',
           'numeric'=> 'Kolom : Attribute Harus Lengkap'
       ];
       $validasi=$request->validate([
        'nama'=> 'required',
        'nik'=> 'required|unique:mahasiswas|max:10',
        'alamat'=> 'required'
       ],$message);
       Mahasiswa::create($validasi);
       return redirect('mahasiswa')->with('success','Data Berhasil Tersimpan!');
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
        $mahasiswa = Mahasiswa::find($id);
        $title = "Edit Data Anda";
        return view('admin.create',compact('title','mahasiswa'));
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
         'nama'=> 'required',
         'nik'=> 'required|unique:mahasiswas|max:10',
         'alamat'=> 'required'
        ],$message);
        Mahasiswa::where('id',$id)->update($validasi);
        return redirect('mahasiswa')->with('success','Data Berhasil Di Update!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Mahasiswa::where('id',$id)->delete();
        return redirect('mahasiswa')->with('success','Data Berhasil Di Hapus!');
    }
    public function cari(Request $request){

        $cari = $request->search;

        $mahasiswa = Mahasiswa::where('nama','like','%'.$cari.'%')->get();
        return view('admin.mahasiswa', ['mahasiswa' => $mahasiswa]);
    }
}
