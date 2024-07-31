<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth/login');
    }

    public function register()
    {
        return view('auth/register');
    }

    public function loginAuth()
    {
        $session = session();
        $model = new UserModel();
        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');
        $data = $model->where('email', $email)->first();

        if ($data) {
            $pass = $data['password'];
            if ($password == $pass) {
                $ses_data = [
                    'id'       => $data['id'],
                    'username' => $data['username'],
                    'email'    => $data['email'],
                    'type'     => $data['type'],
                    'logged_in'=> TRUE
                ];
                $session->set($ses_data);
                if ($data['type'] == 'admin') {
                    return redirect()->to('/dashboard');
                } else {
                    return redirect()->to('/user');
                }
            } else {
                $session->setFlashdata('msg', 'Contraseña incorrecta');
                return redirect()->to('/login');
            }
        } else {
            $session->setFlashdata('msg', 'Usuario no encontrado');
            return redirect()->to('/login');
        }
    }

    public function registerUser()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'password' => $this->request->getVar('password'),
            'email'    => $this->request->getVar('email'),
            'type'     => 'user' // Registro público siempre como usuario
        ];
        $model->save($data);
        return redirect()->to('/login');
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
