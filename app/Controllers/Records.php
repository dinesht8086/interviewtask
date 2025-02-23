<?php
namespace App\Controllers;
use App\Models\RecordsModel;
use CodeIgniter\Controller;

class Records extends Controller {
    public function index() {
        $model = new RecordsModel();
        $data['records'] = $model->findAll();
        return view('records_view', $data);
    }

    public function create() {
        $model = new RecordsModel();
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
        return redirect()->to('/records');
    }

    public function edit($id) {
        $model = new RecordsModel();
        $data['record'] = $model->find($id);
        return view('edit_record', $data);
    }

    public function update($id) {
        $model = new RecordsModel();
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
        return redirect()->to('/records');
    }

    public function delete($id) {
        $model = new RecordsModel();
        $model->delete($id);
        return redirect()->to('/records');
    }
}