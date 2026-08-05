<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $title = "Sistem Sekolah - Daftar Siswa";
        $students = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'class' => 'XII AKL',
                'major' => 'AKL',
            ]
        ];

            return view('students.index', [
                'title' => $title,
                'students' => $students
            ]);
    }

    public function show($id)
    {
        $title = "Sistem Sekolah - Detail Siswa";

        $students = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
                'gender' => 'L',
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'class' => 'XII AKL',
                'major' => 'AKL',
                'gender' => 'P',
            ]
        ];

        $found = null;
        foreach ($students as $s) {
            if ($s['id'] == $id) {
                $found = $s;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Siswa tidak ditemukan');
        }

        $student = (object)[
            'nis' => $found['nis'],
            'name' => $found['name'],
            'gender' => $found['gender'],
            'major' => $found['major'],
            'class' => $found['class'],
        ];

        return view('students.show', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function create()
    {
        $title = "Sistem Sekolah - Tambah Siswa";
        return view('students.create', [
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        return "Menyimpan data siswa baru";
    }

    public function edit($id)
    {
        $title = "Sistem Sekolah - Edit Siswa";

        $students = [
            [
                'id' => 1,
                'nis' => '22100001',
                'name' => 'Andi',
                'class' => 'XII TKJ 3',
                'major' => 'TKJ',
                'gender' => 'L',
            ],
            [
                'id' => 2,
                'nis' => '22100002',
                'name' => 'Budi',
                'class' => 'XII AKL',
                'major' => 'AKL',
                'gender' => 'P',
            ]
        ];

        $found = null;
        foreach ($students as $s) {
            if ($s['id'] == $id) {
                $found = $s;
                break;
            }
        }

        if (!$found) {
            abort(404, 'Siswa tidak ditemukan');
        }

        $student = (object)[
            'nis' => $found['nis'],
            'name' => $found['name'],
            'gender' => $found['gender'],
            'major' => $found['major'],
            'class' => $found['class'],
        ];

        return view('students.edit', [
            'title' => $title,
            'student' => $student,
        ]);
    }

    public function update(Request $request, $id)
    {
        return "Memperbarui data siswa dengan ID: {$id}";
    }

    public function destroy($id)
    {
        return "Menghapus data siswa dengan ID: {$id}";
    }
}
