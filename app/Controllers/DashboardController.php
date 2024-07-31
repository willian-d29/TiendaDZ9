<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\UserModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $saleModel = new SaleModel();
        $userModel = new UserModel();
        $clientModel = new ClientModel();

        $data = [
            'totalProducts' => $productModel->countAllResults(),
            'totalSales' => $saleModel->countAllResults(),
            'totalUsers' => $userModel->countAllResults(),
            'totalClients' => $clientModel->countAllResults()
        ];

        return view('dashboard', $data);
    }
}
