<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard" class="btn btn-danger mb-3">← Kembali</a>
    <h2>Ringkasan Saldo Saat Ini</h2>

    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Pemasukan</h5>
                    <p class="card-text">Rp<?= number_format($saldo->total_pemasukan, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5 class="card-title">Total Pengeluaran</h5>
                    <p class="card-text">Rp<?= number_format($saldo->total_pengeluaran, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5 class="card-title">Saldo Saat Ini</h5>
                    <p class="card-text">Rp<?= number_format(($saldo->total_pemasukan - $saldo->total_pengeluaran), 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>

    <h4>Riwayat Semua Transaksi</h4>
    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Nominal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $t): ?>
            <tr>
                <td><?= $t['tanggal'] ?></td>
                <td><?= $t['kategori'] ?></td>
                <td><?= ucfirst($t['tipe']) ?></td>
                <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
            </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
