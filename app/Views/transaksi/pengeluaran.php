<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard" class="btn btn-danger mb-3">← Kembali</a>
    <h2>Daftar Transaksi Pengeluaran</h2>

    <table class="table table-bordered mt-3">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $t): ?>
            <tr>
                <td><?= $t['tanggal'] ?></td>
                <td><?= $t['kategori_nama'] ?></td>
                <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
