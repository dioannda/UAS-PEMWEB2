<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Tambah Transaksi</h2>
    <form action="/transaksi/store" method="post">
        <?= csrf_field() ?>


        <label>Tipe Transaksi:</label>
        <select name="tipe" id="tipe" class="form-control mb-2" required>
            <option value="">Pilih Tipe</option>
            <option value="pemasukan">Pemasukan</option>
            <option value="pengeluaran">Pengeluaran</option>
        </select>


        <label>Kategori:</label>
        <select name="kategori" id="kategori" class="form-control" required>
            <option value="">-- Pilih Kategori --</option>
            <?php foreach ($kategori as $k): ?>
                <option value="<?= $k['id'] ?>" data-tipe="<?= $k['tipe'] ?>">
                    <?= $k['nama'] ?>
                </option>
            <?php endforeach;
            ?>
        </select>


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

<script>
    const selectTipe = document.getElementById('tipe');
    const kategoriOptions = document.querySelectorAll('#kategori option');

    selectTipe.addEventListener('change', function () {
        const tipeDipilih = this.value;

        kategoriOptions.forEach(option => {
            if (option.dataset.tipe === tipeDipilih || option.value === '') {
                option.style.display = 'block';
            } else {
                option.style.display = 'none';
            }
        });


        document.getElementById('kategori').value = '';
    });
</script>

<?= $this->endSection() ?>