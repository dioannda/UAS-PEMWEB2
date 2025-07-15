<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">✏️ Edit Transaksi</h2>

    <form action="/transaksi/update/<?= $transaksi['id'] ?>" method="post" class="bg-white p-4 rounded shadow-sm">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal Transaksi</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $transaksi['tanggal'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label fw-semibold">Kategori</label>
            <input type="text" name="kategori" id="kategori" class="form-control" value="<?= $transaksi['kategori'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label fw-semibold">Tipe Transaksi</label>
            <select name="tipe" id="tipe" class="form-select">
                <option value="pemasukan" <?= $transaksi['tipe'] == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                <option value="pengeluaran" <?= $transaksi['tipe'] == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran
                </option>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label fw-semibold">Nominal (Rp)</label>
            <input type="number" name="nominal" id="nominal" class="form-control" value="<?= $transaksi['nominal'] ?>"
                required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label fw-semibold">Keterangan</label>
            <textarea name="keterangan" id="keterangan" rows="3"
                class="form-control"><?= $transaksi['keterangan'] ?></textarea>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary me-2">💾 Update</button>
            <a href="/transaksi" class="btn btn-outline-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>