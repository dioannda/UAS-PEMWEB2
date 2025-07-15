<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/transaksi/" class="btn btn-danger mb-3">← Back</a>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Kategori Saya</h2>
        <a href="/kategori/create" class="btn btn-primary">+ Tambah Kategori</a>
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <div class="table-responsive table-rounded">
        <table class="table table-bordered">
            <thead class="table-header-finote">
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
                            <button class="btn btn-danger btn-sm" onclick="confirmDelete(<?= $k['id'] ?>)">Hapus</button>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Kategori yang dihapus tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "/kategori/delete/" + id;
            }
        })
    }
</script>

<?= $this->endSection() ?>