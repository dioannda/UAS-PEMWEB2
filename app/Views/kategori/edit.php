<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">✏️ Edit Kategori</h2>

    <form action="/kategori/update/<?= $kategori['id'] ?>" method="post" class="bg-white p-4 rounded shadow-sm">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="nama" class="form-label fw-semibold">Nama Kategori</label>
            <input type="text" name="nama" id="nama" class="form-control" value="<?= esc($kategori['nama']) ?>"
                placeholder="Contoh: Transportasi, Gaji" required>
        </div>

        <div class="mb-3">
            <label for="tipe" class="form-label fw-semibold">Tipe Kategori</label>
            <select name="tipe" id="tipe" class="form-select" required>
                <option value="pemasukan" <?= $kategori['tipe'] == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                <option value="pengeluaran" <?= $kategori['tipe'] == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran
                </option>
            </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary me-2">💾 Update</button>
            <a href="/kategori" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>