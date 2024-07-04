<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class ClassroomController extends BaseController
{
    protected $classroomModel;
    public function __construct()
    {
        $this->classroomModel = model("Classroom");
    }
    public function index()
    {
        $data = [
            'title' => 'Daftar Kelas',
            'classrooms' => $this->classroomModel->findAll(),
        ];
        return view("classrooms/index_v", $data);
    }

    public function new()
    {
        $data = [
            'title' => 'Form Tambah Data Kelas'
        ];
        return view('classrooms/create_v', $data);
    }

    public function create()
    {
        $data = [
            'nama_kelas' => $this->request->getPost('nama_kelas'),
            'wali_kelas' => $this->request->getPost('wali_kelas'),
            'ruang_kelas' => $this->request->getPost('ruang_kelas')
        ];
        //validasi
        if ($this->classroomModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->classroomModel->errors());
        }
        return redirect()->to('/classroom');
    }


    public function edit($id)
    {
        $data = [
            'title' => 'Form Edit Data Kelas',
            'classroom' => $this->classroomModel->find($id)
        ];
        return view('classrooms/edit_v', $data);
    }

    public function update($id)
    {
        $data = [
            'kelas_id' => $id,
            'nama_kelas' => $this->request->getVar('nama_kelas'),
            'wali_kelas' => $this->request->getVar('wali_kelas'),
            'ruang_kelas' => $this->request->getVar('ruang_kelas')
        ];
        if ($this->classroomModel->save($data) === false) {
            return redirect()->back()->withInput()->with('errors', $this->classroomModel->errors());
        }
        return redirect()->to('/classroom');
    }

    public function delete($id)
    {
        $this->classroomModel->delete($id);
        return redirect()->to('/classroom');
    }
}
