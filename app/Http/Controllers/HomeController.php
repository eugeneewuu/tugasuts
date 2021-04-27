<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $title = 'Data Mahasiswa';
        $data['mahasiswa']=array(
            'nama'=>'Eugene',
            'nim'=>'1915101009',
            'prodi'=>'ilmu komputer',
            'jurusan'=>'teknik Informatika',
            'alamat'=>'Singaraja'
        );
        return view('admin.beranda', compact('title','data'));
    }
    public function dashboard(){
        $title = 'Dashboard';
        return view('admin.dashboard', compact('title'));
    }
}
