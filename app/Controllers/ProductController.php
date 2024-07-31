<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;
use CodeIgniter\Files\File;

class ProductController extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();
        return view('product/index', $data);
    }

    public function create()
    {
        return view('product/create');
    }

    public function store()
    {
        $model = new ProductModel();
        $file = $this->request->getFile('image');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $imagePath = 'uploads/' . $newName;
        } else {
            $imagePath = null;
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'image' => $imagePath,
            'code' => $this->request->getVar('code'),
            'stock' => $this->request->getVar('stock'),
            'expire' => $this->request->getVar('expire'),
            'active' => $this->request->getVar('active')
        ];
        $model->save($data);
        return redirect()->to('/products');
    }

    public function edit($id)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);
        return view('product/edit', $data);
    }

    public function update($id)
    {
        $model = new ProductModel();
        $file = $this->request->getFile('image');
        
        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads', $newName);
            $imagePath = 'uploads/' . $newName;
        } else {
            $imagePath = $this->request->getVar('current_image');
        }

        $data = [
            'name' => $this->request->getVar('name'),
            'price' => $this->request->getVar('price'),
            'image' => $imagePath,
            'code' => $this->request->getVar('code'),
            'stock' => $this->request->getVar('stock'),
            'expire' => $this->request->getVar('expire'),
            'active' => $this->request->getVar('active')
        ];
        $model->update($id, $data);
        return redirect()->to('/products');
    }

    public function delete($id)
    {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products');
    }
}
