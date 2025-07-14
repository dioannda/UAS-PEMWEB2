<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard" class="btn btn-danger mb-3">← Kembali</a>
    <h2>Daftar Transaksi Pemasukan</h2>

    <table class="table table-bordered mt-3">
        <thead>
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
                <td><?= $t['kategori'] ?></td>
                <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
