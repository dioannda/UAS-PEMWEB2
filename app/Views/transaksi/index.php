<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Daftar Transaksi</h2>
    <a href="/transaksi/create" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Kategori</th>
                <th>Tipe</th>
                <th>Nominal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($transaksi as $t): ?>
                <tr>
                    <td><?= $t['tanggal'] ?></td>
                    <td><?= $t['kategori'] ?></td>
                    <td><?= ucfirst($t['tipe']) ?></td>
                    <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
                    <td>
                        <a href="/transaksi/edit/<?= $t['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/transaksi/delete/<?= $t['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus transaksi ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
