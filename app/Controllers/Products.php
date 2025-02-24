<?php
namespace App\Controllers;
use App\Models\ProductModel;
use CodeIgniter\Controller;

class Products extends Controller {
    public function index() {
        $model = new ProductModel();
        $data['records'] = $model->findAll();
        return view('product_view', $data);
    }

    public function create() {
        $model = new ProductModel();
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/uploads/', $newName);
            $filePath = 'uploads/' . $newName;
        } else {
            $filePath = null;
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'file_path' => $filePath
        ];

        $model->save($data);
        return redirect()->to('/products');
    }

    public function edit($id) {
        $model = new ProductModel();
        $data['record'] = $model->find($id);
        return view('edit_product', $data);
    }

    public function update($id) {
        $model = new ProductModel();
        $file = $this->request->getFile('file');

        if ($file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('public/uploads/', $newName);
            $filePath = 'uploads/' . $newName;
        } else {
            $filePath = $this->request->getPost('existing_file');
        }

        $data = [
            'name' => $this->request->getPost('name'),
            'description' => $this->request->getPost('description'),
            'file_path' => $filePath
        ];

        $model->update($id, $data);
        return redirect()->to('/products');
    }

    public function delete($id) {
        $model = new ProductModel();
        $model->delete($id);
        return redirect()->to('/products');
    }
}