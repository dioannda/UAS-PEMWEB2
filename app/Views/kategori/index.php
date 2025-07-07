<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <h2>Kategori Saya</h2>
    <a href="/kategori/create" class="btn btn-primary mb-3">+ Tambah Kategori</a>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Tipe</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($kategori as $k): ?>
                <tr>
                    <td><?= $k['nama'] ?></td>
                    <td><?= ucfirst($k['tipe']) ?></td>
                    <td>
                        <a href="/kategori/edit/<?= $k['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="/kategori/delete/<?= $k['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus kategori ini?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<?= $this->endSection() ?>
