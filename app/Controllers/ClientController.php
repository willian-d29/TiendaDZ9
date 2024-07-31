<?php

namespace App\Controllers;

use App\Models\ProductModel;
use App\Models\SaleModel;
use App\Models\DetailModel;
use App\Models\ClientModel;
use CodeIgniter\Controller;

class ClientController extends Controller
{
    public function index()
    {
        $model = new ClientModel();
        $data['clients'] = $model->findAll();
        return view('client/index', $data);
    }

    public function create()
    {
        return view('client/create');
    }

    public function store()
    {
        $model = new ClientModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'ruc' => $this->request->getVar('ruc'),
            'adress' => $this->request->getVar('adress')
        ];
        $model->save($data);
        return redirect()->to('/clients');
    }

    public function edit($id)
    {
        $model = new ClientModel();
        $data['client'] = $model->find($id);
        return view('client/edit', $data);
    }

    public function update($id)
    {
        $model = new ClientModel();
        $data = [
            'name' => $this->request->getVar('name'),
            'ruc' => $this->request->getVar('ruc'),
            'adress' => $this->request->getVar('adress')
        ];
        $model->update($id, $data);
        return redirect()->to('/clients');
    }

    public function delete($id)
    {
        $model = new ClientModel();
        $model->delete($id);
        return redirect()->to('/clients');
    }

    public function products()
    {
        $productModel = new ProductModel();
        $products = $productModel->where('active', 1)->findAll();

        return view('client/products', ['products' => $products]);
    }

    public function viewProduct($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Producto no encontrado');
        }

        return view('client/view_product', ['product' => $product]);
    }

    public function cart()
    {
        $session = session();
        $cart = $session->get('cart') ? $session->get('cart') : [];

        return view('client/cart', ['cart' => $cart]);
    }

    public function addToCart()
{
    $session = session();
    $productId = $this->request->getPost('product_id');
    $quantity = $this->request->getPost('quantity') ? $this->request->getPost('quantity') : 1;

    $productModel = new ProductModel();
    $product = $productModel->find($productId);

    if (!$product) {
        return redirect()->back()->with('error', 'Producto no encontrado.');
    }

    $cart = $session->get('cart') ? $session->get('cart') : [];
    if (isset($cart[$productId])) {
        $cart[$productId]['quantity'] += $quantity;
    } else {
        $cart[$productId] = [
            'id' => $product['id'],
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity
        ];
    }

    $session->set('cart', $cart);
    return redirect()->to('/client/cart')->with('success', 'Producto añadido al carrito.');
}


    public function removeFromCart($productId)
    {
        $session = session();
        $cart = $session->get('cart') ? $session->get('cart') : [];

        if (isset($cart[$productId])) {
            unset($cart[$productId]);
            $session->set('cart', $cart);
        }

        return redirect()->to('/client/cart')->with('success', 'Producto eliminado del carrito.');
    }

    public function checkout()
    {
        return view('client/checkout');
    }

    public function completeOrder()
    {
        $session = session();
        $cart = $session->get('cart');

        if (!$cart) {
            return redirect()->to('/client/cart')->with('error', 'El carrito está vacío.');
        }

        $clientId = $session->get('clientId'); // Asumiendo que el ID del cliente está almacenado en la sesión
        $total = array_sum(array_map(function ($item) {
            return $item['price'] * $item['quantity'];
        }, $cart));

        $saleModel = new SaleModel();
        $saleId = $saleModel->insert([
            'clientId' => $clientId,
            'total' => $total,
            'created' => date('Y-m-d H:i:s')
        ]);

        $detailModel = new DetailModel();
        foreach ($cart as $item) {
            $detailModel->insert([ 'saleId' => $saleId,'productId' => $item['id'],'amount' => $item['quantity']]);
        }

        $session->remove('cart');
        return redirect()->to('/client/order_history')->with('success', 'Pedido completado con éxito.');
    }

    public function orderHistory()
    {
        $session = session();
        $clientId = $session->get('clientId');

        $saleModel = new SaleModel();
        $sales = $saleModel->where('clientId', $clientId)->findAll();

        return view('client/order_history', ['sales' => $sales]);
    }
}
