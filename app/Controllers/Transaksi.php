<?php
namespace App\Controllers;

use App\Models\TransaksiModel;
use App\Models\KategoriModel;

class Transaksi extends BaseController
{
    public function index()
    {
        $model = new TransaksiModel();
        $userId = session()->get('user_id');

        $data['transaksi'] = $model->where('user_id', $userId)->orderBy('tanggal', 'DESC')->findAll();
        return view('transaksi/index', $data);
    }


    public function create()
    {
        $kategoriModel = new \App\Models\KategoriModel();
        $userId = session()->get('user_id');

        $kategori = $kategoriModel
            ->groupStart()
            ->where('user_id', $userId)
            ->orWhere('user_id', null)
            ->groupEnd()
            ->findAll();

        return view('transaksi/create', ['kategori' => $kategori]);
    }

    public function store()
    {
        $model = new TransaksiModel();
        $model->save([
            'user_id' => session()->get('user_id'),
            'tanggal' => $this->request->getPost('tanggal'),
            'kategori' => $this->request->getPost('kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $model = new TransaksiModel();
        $data['transaksi'] = $model->where('id', $id)->where('user_id', session()->get('user_id'))->first();

        return view('transaksi/edit', $data);
    }

    public function update($id)
    {
        $model = new TransaksiModel();
        $model->update($id, [
            'tanggal' => $this->request->getPost('tanggal'),
            'kategori' => $this->request->getPost('kategori'),
            'tipe' => $this->request->getPost('tipe'),
            'nominal' => $this->request->getPost('nominal'),
            'keterangan' => $this->request->getPost('keterangan'),
        ]);

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil diperbarui.');
    }

    public function delete($id)
    {
        $model = new TransaksiModel();
        $model->where('id', $id)->where('user_id', session()->get('user_id'))->delete();

        return redirect()->to('/transaksi')->with('success', 'Transaksi berhasil dihapus.');
    }
}
