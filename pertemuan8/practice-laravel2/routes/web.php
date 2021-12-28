<?php

use Illuminate\Support\Facades\Route;
//import class my controller
use App\Http\Controllers\mycontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//penulidan route menggunakan controller
// ketika mengakses url /beranda dengan method get maka
//akan diarakan ke controller dengan nama class mycontroller
//dengan method index
//penulisan route di laravel 7
// Route::get('/beranda', 'mycontroller@index');


//penulisan route di laravel 8
Route::get('/beranda', [mycontroller::class, 'index'])->name("beranda");
Route::get('/about', [mycontroller::class, 'about'])->name("about");
Route::get('/mahasiswa', [mycontroller::class, 'mahasiswa'])->name("mahasiswa");

//route tanpa melalui controller
// Route::view('/base', 'base');

// Route::view('/beranda', 'beranda')->name("beranda");
// Route::view('/aboutus', 'about')->name("about");
