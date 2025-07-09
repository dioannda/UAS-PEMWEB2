<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Edit Pengingat</h2>

    <form action="/pengingat/update/<?= $pengingat['id'] ?>" method="post">
        <?= csrf_field() ?>

        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" name="deskripsi" id="deskripsi" class="form-control"
                value="<?= esc($pengingat['deskripsi']) ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="tanggal_pembayaran">Tanggal Pembayaran</label>
            <input type="date" name="tanggal_pembayaran" id="tanggal_pembayaran" class="form-control"
                value="<?= esc($pengingat['tanggal_pembayaran']) ?>" required>
        </div>

        <div class="form-group mt-2">
            <label for="status">Status</label>
            <select name="status" id="status" class="form-control">
                <option value="belum" <?= $pengingat['status'] === 'belum' ? 'selected' : '' ?>>Belum</option>
                <option value="selesai" <?= $pengingat['status'] === 'selesai' ? 'selected' : '' ?>>Selesai</option>
            </select>
        </div>

        <div class="mt-3">
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="/pengingat" class="btn btn-secondary">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>