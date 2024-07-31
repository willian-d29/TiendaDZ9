<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $session = session();
        if ($session->get('type') !== 'admin') {
            return redirect()->to('/login');
        }

        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin/index', $data);
    }

    public function create()
    {
        $session = session();
        if ($session->get('type') !== 'admin') {
            return redirect()->to('/login');
        }

        return view('admin/create');
    }

    public function store()
    {
        $session = session();
        if ($session->get('type') !== 'admin') {
            return redirect()->to('/login');
        }

        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'email'    => $this->request->getVar('email'),
            'type'     => $this->request->getVar('type')
        ];
        $model->save($data);
        return redirect()->to('/admin');
    }
}
