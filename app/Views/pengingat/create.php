<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">🔔 Tambah Pengingat Pembayaran</h2>

    <form action="/pengingat/store" method="post" class="bg-white p-4 rounded shadow-sm">
        <div class="mb-3">
            <label for="judul" class="form-label fw-semibold">Deskripsi Pengingat</label>
            <input type="text" class="form-control" id="judul" name="judul" placeholder="Contoh: Bayar tagihan listrik"
                required>
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-2">💾 Simpan</button>
            <a href="/pengingat" class="btn btn-outline-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>