<?php
namespace App\Controllers;

use App\Models\PengingatPembayaranModel;

class PengingatPembayaranController extends BaseController
{
    public function index()
    {
        $model = new PengingatPembayaranModel();
        $userId = session()->get('user_id');

        $data['pengingat'] = $model->where('user_id', $userId)->findAll();

        return view('pengingat/index', $data);
    }

    public function create()
    {
        return view('pengingat/create');
    }

    public function store()
    {
        $model = new PengingatPembayaranModel();
        $userId = session()->get('user_id');

        $data = [
            'user_id' => $userId,
            'deskripsi' => $this->request->getPost('judul'),
            'tanggal_pembayaran' => $this->request->getPost('tanggal'),
            'status' => 'belum',
        ];

        $model->insert($data);
        return redirect()->to('/pengingat')->with('success', 'Pengingat pembayaran berhasil ditambahkan.');
    }
    public function selesai($id)
    {
        $model = new \App\Models\PengingatPembayaranModel();
        $pengingat = $model->find($id);

        if (!$pengingat) {
            return redirect()->to('/pengingat')->with('error', 'Data tidak ditemukan.');
        }

        $model->update($id, ['status' => 'selesai']);
        return redirect()->to('/pengingat')->with('success', 'Status pengingat diperbarui menjadi selesai.');
    }
    public function edit($id)
    {
        $model = new \App\Models\PengingatPembayaranModel();
        $pengingat = $model->find($id);

        if (!$pengingat) {
            return redirect()->to('/pengingat')->with('error', 'Data tidak ditemukan.');
        }

        return view('pengingat/edit', ['pengingat' => $pengingat]);
    }

    public function update($id)
    {
        $model = new \App\Models\PengingatPembayaranModel();

        $data = [
            'deskripsi' => $this->request->getPost('deskripsi'),
            'tanggal_pembayaran' => $this->request->getPost('tanggal_pembayaran'),
            'status' => $this->request->getPost('status'),
        ];

        $model->update($id, $data);

        return redirect()->to('/pengingat')->with('success', 'Pengingat diperbarui.');
    }

    public function delete($id)
    {
        $model = new \App\Models\PengingatPembayaranModel();
        $model->delete($id);

        return redirect()->to('/pengingat')->with('success', 'Pengingat berhasil dihapus.');
    }

    public function markAsSelesai($id)
    {
        $model = new \App\Models\PengingatPembayaranModel();
        $model->update($id, ['status' => 'selesai']);

        return redirect()->to('/pengingat')->with('success', 'Pengingat ditandai selesai.');
    }

}
