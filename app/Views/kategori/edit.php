<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Kategori</h2>
    <form action="/kategori/update/<?= $kategori['id'] ?>" method="post">
        <?= csrf_field() ?>
        <input type="text" name="nama" class="form-control mb-2" value="<?= $kategori['nama'] ?>" required>
        <select name="tipe" class="form-control mb-2" required>
            <option value="pemasukan" <?= $kategori['tipe'] == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
            <option value="pengeluaran" <?= $kategori['tipe'] == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
        </select>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/kategori" class="btn btn-secondary">Batal</a>
    </form>
</div>

<?= $this->endSection() ?>
