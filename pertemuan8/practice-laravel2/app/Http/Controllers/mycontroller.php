<?php
// membuat controller menggunakan cmd : php artisan make:controller mycontroller
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class mycontroller extends Controller
{
    //cara pertama
    public function index()
    {
        // menampilkan  data beranda
        return view('beranda')->with('name', 'test mengambil data');
    }
    public function about()
    {
        return view('about');
    }
    public function mahasiswa()
    {
        return view('mahasiswa');
    }
}
