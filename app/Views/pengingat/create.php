<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tambah Pengingat Pembayaran</h2>
    <form action="/pengingat/store" method="post">
        <div class="mb-3">
            <label for="judul" class="form-label">Deskripsi</label>
            <input type="text" class="form-control" id="judul" name="judul" required>
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Pembayaran</label>
            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
        </div>
        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-success">Simpan</button>
            <a href="/pengingat" class="btn btn-secondary">Kembali</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>