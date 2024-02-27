<?php

namespace App\Controllers;

use App\Models\ProductModel;
use CodeIgniter\Controller;

class Products extends Controller
{
    public function index()
    {
        $model = new ProductModel();
        $data['products'] = $model->findAll();

        return view('products/index', $data);
    }

    public function create()
    {
        return view('products/create');
    }

    public function store()
    {
        $model = new ProductModel();

        $data = [
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ];

        $model->insert($data);

        return redirect()->to('/products');
    }

    public function edit($id = null)
    {
        $model = new ProductModel();
        $data['product'] = $model->find($id);

        return view('products/edit', $data);
    }

    public function update()
    {
        $model = new ProductModel();

        $id = $this->request->getPost('id');

        $data = [
            'name'  => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
        ];

        $model->update($id, $data);

        return redirect()->to('/products');
    }

    public function delete($id = null)
    {
        $model = new ProductModel();
        $model->delete($id);

        return redirect()->to('/products');
    }
}
