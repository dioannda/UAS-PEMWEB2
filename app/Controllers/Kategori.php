<?php namespace App\Controllers;

use App\Models\KategoriModel;

class Kategori extends BaseController
{
    public function index()
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->where('user_id', session()->get('user_id'))->findAll();
        return view('kategori/index', $data);
    }

    public function create()
    {
        return view('kategori/create');
    }

    public function store()
    {
        $model = new KategoriModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'nama'    => $this->request->getPost('nama'),
            'tipe'    => $this->request->getPost('tipe'),
        ]);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new KategoriModel();
        $data['kategori'] = $model->where('id', $id)->where('user_id', session()->get('user_id'))->first();
        return view('kategori/edit', $data);
    }

    public function update($id)
    {
        $model = new KategoriModel();
        $model->update($id, [
            'nama' => $this->request->getPost('nama'),
            'tipe' => $this->request->getPost('tipe'),
        ]);

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new KategoriModel();
        $model->where('id', $id)->where('user_id', session()->get('user_id'))->delete();

        return redirect()->to('/kategori')->with('success', 'Kategori berhasil dihapus.');
    }
}
