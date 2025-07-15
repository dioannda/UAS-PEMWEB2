<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tambah Kategori</h2>
    <form action="/kategori/store" method="post">
        <?= csrf_field() ?>
        <input type="text" name="nama" class="form-control mb-2" placeholder="Nama Kategori" required>
        <select name="tipe" class="form-control mb-2" required>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>
        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/kategori" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>