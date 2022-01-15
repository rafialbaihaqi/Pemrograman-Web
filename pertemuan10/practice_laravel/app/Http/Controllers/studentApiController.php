<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;
use App\Student as AppStudent;

class studentApiController extends Controller
{
    public function index()
    {
        // mengambil data dari database
        // lalu simpan ke dalam array
        $data['students'] = Student::all();
        //laldu return data arrey ke API
        return response()->json($data);
    }

    public function getById($id)
    {
        //ambil data dari database berdasarkan id
        // lalu simpan ke array
        $data['student'] = Student::find($id);

        // lalu return data array ke API
        return response()->json($data);
    }

    // menampilkan data siswa berdasarkan parameter nim
    // menggunakan API
    public function getByNim($nim)
    {
        //ambil data dari database berdasarkan id
        // lalu simpan ke array
        $data['student'] = Student::where('nim', $nim)->first();

        // lalu return data array ke API
        return response()->json($data);
    }

    public function save()
    {
        $student = new Student();
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response()->json(['message' => "Data Berhasil Disimpan"]);
    }
    public function update($id)
    {
        $student = Student::find($id);
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();

        return response()->json(['message' => "Data Berhasil Diubah"]);
    }

    public function delete($id)
    {
        // ambil data berdasarkan id
        $student = Student::find($id);
        $student->delete();

        //hapus data siswa
        return response()->json(['message' => "Data Berhasil Dihapus"]);
    }
}
