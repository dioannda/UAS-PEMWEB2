<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tambah Transaksi</h2>
    <form action="/transaksi/store" method="post">
        <?= csrf_field() ?>

        <!-- Tipe Transaksi -->
        <label>Tipe Transaksi:</label>
        <select name="tipe" id="tipe" class="form-control mb-2" required>
            <option value="">Pilih Tipe</option>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>

        <!-- Kategori (Akan berubah berdasarkan tipe) -->
        <label>Kategori:</label>
        <select name="kategori" id="kategori" class="form-control mb-2" required>
            <option value="">Pilih Tipe Terlebih Dahulu</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['nama'] ?>" data-tipe="<?= $k['tipe'] ?>">
                    <?= ucfirst($k['nama']) ?>
                </option>
            <?php endforeach ?>
        </select>

        <!-- Form lainnya -->
        <label>Nominal:</label>
        <input type="number" name="nominal" class="form-control mb-2" required>

        <label>Keterangan:</label>
        <input type="text" name="keterangan" class="form-control mb-2">

        <label>Tanggal:</label>
        <input type="date" name="tanggal" class="form-control mb-3" required>

        <button type="submit" class="btn btn-success">Simpan</button>
        <a href="/transaksi" class="btn btn-secondary">Batal</a>
    </form>
</div>

<!-- JS untuk filter kategori -->
<script>
    const tipeSelect = document.getElementById('tipe');
    const kategoriSelect = document.getElementById('kategori');
    const semuaOption = [...kategoriSelect.options];

    tipeSelect.addEventListener('change', function () {
        const tipeDipilih = this.value;

        // Kosongkan dulu
        kategoriSelect.innerHTML = '';

        // Tambah opsi default
        kategoriSelect.appendChild(new Option('Pilih Kategori', ''));

        // Filter & tampilkan berdasarkan tipe
        semuaOption.forEach(opt => {
            if (opt.dataset?.tipe === tipeDipilih) {
                kategoriSelect.appendChild(opt.cloneNode(true));
            }
        });
    });
</script>

<?= $this->endSection() ?>
