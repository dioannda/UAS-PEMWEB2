<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard/" class="btn btn-danger mb-3">← Back</a>
    <h2 class="fw-semibold mb-4">Laporan Keuangan</h2>

    <!-- Filter Form -->
    <form action="/laporan" method="post" class="row g-3 mb-4">
        <div class="col-md-3">
            <label class="form-label fw-semibold">Bulan</label>
            <select name="bulan" class="form-select shadow-sm">
                <?php for ($m = 1; $m <= 12; $m++): ?>
                    <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT) ?>" <?= $bulan == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $m, 1)) ?>
                    </option>
                <?php endfor ?>
            </select>
        </div>
        <div class="col-md-3">
            <label class="form-label fw-semibold">Tahun</label>
            <select name="tahun" class="form-select shadow-sm">
                <?php for ($y = date('Y') - 5; $y <= date('Y'); $y++): ?>
                    <option value="<?= $y ?>" <?= $tahun == $y ? 'selected' : '' ?>><?= $y ?></option>
                <?php endfor ?>
            </select>
        </div>
        <div class="col-md-3 align-self-end d-grid">
            <button type="submit" class="btn btn-outline-primary">Tampilkan</button>
        </div>
        <div class="col-md-3 align-self-end d-grid">
            <a href="/laporan/pdf?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-outline-danger"
                target="_blank">Unduh PDF</a>
        </div>
    </form>

    <!-- Ringkasan Keuangan -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card text-white mb-3" style="background-color: #218c74;">
                <div class="card-body">
                    <h6 class="card-title">Total Pemasukan</h6>
                    <p class="card-text fs-5 fw-bold">Rp<?= number_format($pemasukan, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white mb-3" style="background-color: #e74c3c;">
                <div class="card-body">
                    <h6 class="card-title">Total Pengeluaran</h6>
                    <p class="card-text fs-5 fw-bold">Rp<?= number_format($pengeluaran, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white mb-3" style="background-color: #1e90ff;">
                <div class="card-body">
                    <h6 class="card-title">Saldo</h6>
                    <p class="card-text fs-5 fw-bold">Rp<?= number_format($saldo, 0, ',', '.') ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Transaksi -->
    <div class="table-responsive">
        <table class="table table-bordered table-rounded mt-3">
            <thead class="table-header-finote">
                <tr>
                    <th>Tanggal</th>
                    <th>Kategori</th>
                    <th>Nominal</th>
                    <th>Tipe</th>
                    <th>Keterangan</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($transaksi as $t): ?>
                    <tr>
                        <td><?= $t['tanggal'] ?></td>
                        <td><?= $t['kategori_nama'] ?></td>
                        <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
                        <td><?= ucfirst($t['tipe']) ?></td>
                        <td><?= $t['keterangan'] ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>