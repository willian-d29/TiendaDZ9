<?php

namespace App\Controllers;

use App\Models\SaleModel;
use App\Models\DetailModel;
use App\Models\ClientModel;
use App\Models\ProductModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class SaleController extends Controller
{
    public function index()
    {
        $saleModel = new SaleModel();
        $clientModel = new ClientModel();
        $userModel = new UserModel();

        $sales = $saleModel->findAll();
        $clients = $clientModel->findAll();
        $users = $userModel->findAll();

        $data['sales'] = [];
        foreach ($sales as $sale) {
            $sale['clientName'] = $clients[$sale['clientId']]['name'] ?? 'Desconocido';
            $sale['userName'] = $users[$sale['userId']]['username'] ?? 'Desconocido';
            $data['sales'][] = $sale;
        }

        return view('sale/index', $data);
    }

    public function create()
    {
        $clientModel = new ClientModel();
        $productModel = new ProductModel();
        $data['clients'] = $clientModel->findAll();
        $data['products'] = $productModel->where('active', 1)->findAll();
        return view('sale/create', $data);
    }

    public function store()
    {
        $saleModel = new SaleModel();
        $detailModel = new DetailModel();

        $saleData = [
            'created' => $this->request->getVar('created'),
            'clientId' => $this->request->getVar('client_id'),
            'total' => $this->request->getVar('total'),
            'userId' => session()->get('id')
        ];

        $saleModel->save($saleData);
        $saleId = $saleModel->insertID();

        $products = $this->request->getVar('products');
        if ($products) {
            foreach ($products as $productId => $quantity) {
                if ($quantity > 0) {
                    $detailData = [
                        'saleId' => $saleId,
                        'productId' => $productId,
                        'amount' => $quantity
                    ];
                    $detailModel->save($detailData);
                }
            }
        }

        return redirect()->to('/sales');
    }

    public function delete($id)
    {
        $saleModel = new SaleModel();
        $detailModel = new DetailModel();

        $detailModel->where('saleId', $id)->delete();
        $saleModel->delete($id);

        return redirect()->to('/sales')->with('success', 'Venta eliminada con éxito.');
    }
}
