<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2 class="mb-4 fw-bold text-primary">➕ Tambah Transaksi</h2>

    <form action="/transaksi/store" method="post" class="bg-white p-4 rounded shadow-sm">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="tipe" class="form-label fw-semibold">Tipe Transaksi</label>
            <select name="tipe" id="tipe" class="form-select" required>
                <option value="">Pilih Tipe</option>
                <option value="pemasukan">Pemasukan</option>
                <option value="pengeluaran">Pengeluaran</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="kategori" class="form-label fw-semibold">Kategori</label>
            <select name="kategori" id="kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k): ?>
                    <option value="<?= $k['id'] ?>" data-tipe="<?= $k['tipe'] ?>">
                        <?= $k['nama'] ?>
                    </option>
                <?php endforeach ?>
            </select>
        </div>

        <div class="mb-3">
            <label for="nominal" class="form-label fw-semibold">Nominal (Rp)</label>
            <input type="number" name="nominal" id="nominal" class="form-control" placeholder="Contoh: 50000" required>
        </div>

        <div class="mb-3">
            <label for="keterangan" class="form-label fw-semibold">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Opsional">
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label fw-semibold">Tanggal Transaksi</label>
            <input type="date" name="tanggal" id="tanggal" class="form-control" required>
        </div>

        <div class="d-flex justify-content-end mt-4">
            <button type="submit" class="btn btn-success me-2">💾 Simpan</button>
            <a href="/transaksi" class="btn btn-outline-secondary">Batal</a>
        </div>
    </form>
</div>

<script>
    const selectTipe = document.getElementById('tipe');
    const kategoriOptions = document.querySelectorAll('#kategori option');

    selectTipe.addEventListener('change', function () {
        const tipeDipilih = this.value;
        kategoriOptions.forEach(option => {
            option.style.display = (option.dataset.tipe === tipeDipilih || option.value === '') ? 'block' : 'none';
        });
        document.getElementById('kategori').value = '';
    });
</script>

<?= $this->endSection() ?>