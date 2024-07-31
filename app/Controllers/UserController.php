<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\SaleModel;
use App\Models\DetailModel;
use CodeIgniter\Controller;

class UserController extends Controller
{
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('admin/index', $data);
    }

    public function create()
    {
        return view('admin/create');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getVar('username'),
            'email' => $this->request->getVar('email'),
            'password' => $this->request->getVar('password'),
            'type' => $this->request->getVar('type')
        ];
        $model->save($data);
        return redirect()->to('/admin');
    }

    public function delete($id)
    {
        $detailModel = new DetailModel();
        $salesModel = new SaleModel();
        
        // Obtener todas las ventas realizadas por el usuario
        $sales = $salesModel->where('userId', $id)->findAll();
        
        foreach ($sales as $sale) {
            // Eliminar detalles asociados a cada venta
            $detailModel->where('saleId', $sale['id'])->delete();
            // Eliminar la venta
            $salesModel->delete($sale['id']);
        }
        
        // Finalmente, eliminar el usuario
        $userModel = new UserModel();
        $userModel->delete($id);
        
        return redirect()->to('/admin')->with('success', 'Usuario eliminado con éxito.');
    }
}
