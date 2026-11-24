<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class StudentController extends Controller
{
    //aturan validasi (NIM harus unik, saat edit abaikan data sendiri)
    private function rules(?Student $student = null) {
        $nim = Rule::unique('students', 'nim');
        if ($student) {
            $nim = $nim->ignore($student->id);
        }

        return [
            'nim'     => ['required', 'max:20', $nim],
            'nama'    => 'required|max:50',
            'alamat'  => 'required',
            'gender'  => 'required|in:L,P',
            'jurusan' => 'required|max:50',
        ];
    }

    public function index() {
        $data['judul'] = 'Data Student';
        $data['students'] = Student::all();
        return view('student.index', $data);
    }

    public function create() {
        $data['judul'] = 'Tambah Student';
        return view('student.create', $data);
    }

    public function store(Request $request) {
        $valid = $request->validate($this->rules());
        Student::create($valid);

        return redirect('/student')->with('sukses', 'Data student berhasil ditambahkan');
    }

    public function edit(Student $student) {
        $data['judul'] = 'Edit Student';
        $data['student'] = $student;
        return view('student.edit', $data);
    }

    public function update(Request $request, Student $student) {
        $valid = $request->validate($this->rules($student));
        $student->update($valid);

        return redirect('/student')->with('sukses', 'Data student berhasil diubah');
    }

    public function destroy(Student $student) {
        $student->delete();

        return redirect('/student')->with('sukses', 'Data student berhasil dihapus');
    }
}
