<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Transaksi</h2>
    <form action="/transaksi/update/<?= $transaksi['id'] ?>" method="post">
        <?= csrf_field() ?>
        <input type="date" name="tanggal" class="form-control mb-2" value="<?= $transaksi['tanggal'] ?>" required>
        <input type="text" name="kategori" class="form-control mb-2" value="<?= $transaksi['kategori'] ?>" required>
        <select name="tipe" class="form-control mb-2">
            <option value="pemasukan" <?= $transaksi['tipe'] == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
            <option value="pengeluaran" <?= $transaksi['tipe'] == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
        </select>
        <input type="number" name="nominal" class="form-control mb-2" value="<?= $transaksi['nominal'] ?>" required>
        <textarea name="keterangan" class="form-control mb-2"><?= $transaksi['keterangan'] ?></textarea>
        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/transaksi" class="btn btn-secondary">Kembali</a>
    </form>
</div>

<?= $this->endSection() ?>
