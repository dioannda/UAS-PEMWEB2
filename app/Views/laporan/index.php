<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard/" class="btn btn-danger mb-3">← Back</a>
    <h2>Laporan Keuangan</h2>

    <form action="/laporan" method="post" class="row g-3 mb-3">
        <div class="col-md-3">
            <label>Bulan:</label>
            <select name="bulan" class="form-control">
                <?php for ($m = 1; $m <= 12; $m++): ?>
                    <option value="<?= str_pad($m, 2, '0', STR_PAD_LEFT) ?>" <?= $bulan == str_pad($m, 2, '0', STR_PAD_LEFT) ? 'selected' : '' ?>>
                        <?= date('F', mktime(0, 0, 0, $m, 1)) ?>
                    </option>
                <?php endfor ?>
            </select>
        </div>
        <div class="col-md-3">
            <label>Tahun:</label>
            <select name="tahun" class="form-control">
                <?php for ($y = date('Y') - 5; $y <= date('Y'); $y++): ?>
                    <option value="<?= $y ?>" <?= $tahun == $y ? 'selected' : '' ?>><?= $y ?></option>
                <?php endfor ?>
            </select>
        </div>
        <div class="col-md-3 align-self-end">
            <button type="submit" class="btn btn-primary">Tampilkan</button>
        </div>
        <div class="col-md-3 align-self-end">
            <a href="/laporan/pdf?bulan=<?= $bulan ?>&tahun=<?= $tahun ?>" class="btn btn-danger" target="_blank">Unduh
                PDF</a>
        </div>
    </form>

    <h5>Ringkasan</h5>
    <ul>
        <li>Total Pemasukan: <strong>Rp<?= number_format($pemasukan, 0, ',', '.') ?></strong></li>
        <li>Total Pengeluaran: <strong>Rp<?= number_format($pengeluaran, 0, ',', '.') ?></strong></li>
        <li>Saldo: <strong>Rp<?= number_format($saldo, 0, ',', '.') ?></strong></li>
    </ul>

    <table class="table table-bordered mt-3">
        <thead>
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

<?= $this->endSection() ?>