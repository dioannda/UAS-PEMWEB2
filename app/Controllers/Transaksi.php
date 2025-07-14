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

    $data['transaksi'] = $model
        ->select('transaksi.*, kategori.nama as kategori_nama')
        ->join('kategori', 'kategori.id = transaksi.kategori', 'left')
        ->where('transaksi.user_id', $userId)
        ->orderBy('tanggal', 'DESC')
        ->findAll();

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
         session()->setFlashdata('success', 'Transaksi berhasil dihapus!');
    return redirect()->to('/transaksi');
    }
   public function pemasukan()
{
    $userId = session()->get('user_id');
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    $builder->select('transaksi.*, kategori.nama AS kategori_nama');
    $builder->join('kategori', 'kategori.id = transaksi.kategori', 'left');
    $builder->where('transaksi.user_id', $userId);
    $builder->where('transaksi.tipe', 'pemasukan');
    $builder->orderBy('transaksi.tanggal', 'DESC');

    $data['transaksi'] = $builder->get()->getResultArray();

    return view('transaksi/pemasukan', $data);
}

public function pengeluaran()
{
    $userId = session()->get('user_id');
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    $builder->select('transaksi.*, kategori.nama AS kategori_nama');
    $builder->join('kategori', 'kategori.id = transaksi.kategori', 'left');
    $builder->where('transaksi.user_id', $userId);
    $builder->where('transaksi.tipe', 'pengeluaran');
    $builder->orderBy('transaksi.tanggal', 'DESC');

    $data['transaksi'] = $builder->get()->getResultArray();

    return view('transaksi/pengeluaran', $data);
}


public function saldo()
{
    $userId = session()->get('user_id');
    $db = \Config\Database::connect();

    $builder = $db->table('transaksi');
    $builder->select('transaksi.*, kategori.nama AS kategori_nama');
    $builder->join('kategori', 'kategori.id = transaksi.kategori', 'left');
    $builder->where('transaksi.user_id', $userId);
    $builder->orderBy('transaksi.tanggal', 'DESC');

    $data['transaksi'] = $builder->get()->getResultArray();

    $result = $db->table('transaksi')->select(
        'SUM(CASE WHEN tipe = "pemasukan" THEN nominal ELSE 0 END) as total_pemasukan,
         SUM(CASE WHEN tipe = "pengeluaran" THEN nominal ELSE 0 END) as total_pengeluaran'
    )->where('user_id', $userId)->get()->getRow();

    $data['saldo'] = $result;

    return view('transaksi/saldo', $data);
}


}
