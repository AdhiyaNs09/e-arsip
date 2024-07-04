<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class UserController extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Daftar User',
            // 'users' => $this->userModel->findAll(),
        ];
        return view('user/index_v', $data);
    }
}
