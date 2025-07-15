<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">✏️ Edit Pengingat</h2>

    <form action="/pengingat/update/<?= $pengingat['id'] ?>" method="post" class="bg-white p-4 rounded shadow-sm">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                value="<?= esc($pengingat['deskripsi']) ?>" placeholder="Contoh: Bayar cicilan motor" required>
        </div>

        <div class="mb-3">
            <label for="tanggal_pembayaran" class="form-label fw-semibold">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control"
                value="<?= esc($pengingat['tanggal_pembayaran']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label fw-semibold">Status</label>
            <select name="status" id="status" class="form-select">
                <option value="belum" <?= $pengingat['status'] === 'belum' ? 'selected' : '' ?>>Belum</option>
                <option value="selesai" <?= $pengingat['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-primary me-2">💾 Simpan</button>
            <a href="/pengingat" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>