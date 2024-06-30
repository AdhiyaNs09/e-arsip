<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class StudyController extends BaseController
{
    protected $studyModel;
    protected $teacherModel;
    public function __construct()
    {
        $this->studyModel = model("Study");
        $this->teacherModel = model("Teacher");
    }
    public function index()
    {        
        $data = [
            'title' => 'Daftar Mata Pelajaran',
            'studies' => $this->studyModel->getMapelWithGuru(),
        ];
        return view('studies/index_v', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Mata Pelajaran',
            'teachers' => $this->teacherModel->findAll(),
        ];
        return view('studies/create_v', $data);
    }

    public function store()
    {
        $data = [            
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'guru_id' => $this->request->getPost('guru_id'),
        ];
        if($this->studyModel->save($data) === false){
            return redirect()->back()->withInput()->with('errors', $this->studyModel->errors());
        }
        return redirect()->to('/study');
    }

    public function edit($id)
    {
        $data = [
            'title' => 'Edit Mata Pelajaran',
            'studies' => $this->studyModel->find($id),
            'teachers' => $this->teacherModel->findAll(),
        ];
        return view('studies/edit_v', $data);
    }

    public function update($id)
    {
        $data = [            
            'mapel_id' => $id,
            'nama_mapel' => $this->request->getPost('nama_mapel'),
            'guru_id' => $this->request->getPost('guru_id'),
        ];
        if($this->studyModel->save($data) === false){
            return redirect()->back()->withInput()->with('errors', $this->studyModel->errors());
        }
        return redirect()->to('/study')->with('message', 'Data mata pelajaran berhasil diperbarui');
    }

    public function delete($id)
    {
        $this->studyModel->delete($id);
        return redirect()->to('/study')->with('message', 'Data mata pelajaran berhasil dihapus');
    }
}
