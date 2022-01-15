<?php

namespace App\Http\Controllers;

use App\Student;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    // variabel array studen isinya data student tabel
    // kemudian akan dilempar ke view dengan membawa data tersebut
    public function index()
    {
        $data['students'] = Student::all();
        return view('student', $data);
    }

    public function create()
    {
        $data['gender'] = ["L", "P"];
        $data['departement'] = ["S1 RPL", "S1 Informatika", "S1 Sistem Informasi"];
        return view('studentTambah', $data);
    }
    public function store()
    {
        $student = new Student();
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();
        return redirect()->back()->with('pesan', "Berhasil input data ");
    }
    public function edit($id)
    {
        $data['student'] = Student::find($id);
        // menambahkan gender dan departement karena sebelumnya sudah menambahkan di fungsi createnya

        $data['gender'] = ["L", "P"];
        $data['departement'] = ["S1 RPL", "S1 Informatika", "S1 Sistem Informasi"];
        return view('studentEdit', $data);
    }
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->nim = request('nim');
        $student->name = request('name');
        $student->gender = request('gender');
        $student->departement = request('departement');
        $student->address = request('address');
        $student->save();
        return redirect()->back()->with('pesan', "Berhasil input data ");
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();
        return redirect()->back()->with('pesan', "Berhasil hapus data");
    }
}
