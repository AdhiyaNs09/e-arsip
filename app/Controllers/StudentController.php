<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StudentController extends BaseController
{
    protected $studentModel;
    protected $classroomModel;
    public function __construct()
    {
        $this->studentModel = model("Student");
        $this->classroomModel = model("Classroom");
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Siswa',
            'students' => $this->studentModel->getSiswaWithKelas(),
        ];
        return view('students/index_v', $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Form Tambah Data Siswa',
            'classrooms' => $this->classroomModel->findAll(),
        ];
        return view('students/create_v', $data);
    }

    public function create()
    {
        $data = [
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'nisn' => $this->request->getPost('nisn'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak'),
        ];
        if ($this->studentModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->studentModel->errors());
        }
        return redirect()->to('/student')->with('message', 'Data siswa berhasil ditambahkan');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edir Siswa',
            'students' => $this->studentModel->find($id),
            'classrooms' => $this->classroomModel->findAll(),
        ];
        return view('students/edit_v', $data);
    }

    public function update($id)
    {
        $data = [
            'siswa_id' => $id,
            'nama_siswa' => $this->request->getPost('nama_siswa'),
            'nisn' => $this->request->getPost('nisn'),
            'kelas_id' => $this->request->getPost('kelas_id'),
            'alamat' => $this->request->getPost('alamat'),
            'kontak' => $this->request->getPost('kontak')
        ];
        if ($this->studentModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->studentModel->errors());
        }
        return redirect()->to('/student')->with('message', 'Data siswa berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->studentModel->delete($id);
        return redirect()->to('/student')->with('message', 'Data siswa berhasil dihapus');
    }
}
