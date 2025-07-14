<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <a href="/dashboard" class="btn btn-danger mb-3">← Back</a>

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Daftar Transaksi</h2>
        <a href="/kategori/" class="btn btn-success">+ Tambah Kategori</a>
    </div>

    <a href="/transaksi/create" class="btn btn-primary mb-3">+ Tambah Transaksi</a>

    <?php if (session()->getFlashdata('success')): ?>
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '<?= session()->getFlashdata('success') ?>',
                timer: 2000,
                showConfirmButton: false
            });
        </script>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops!',
                text: '<?= session()->getFlashdata('error') ?>',
                showConfirmButton: true
            });
        </script>
    <?php endif; ?>

    <table class="table table-bordered">
        <thead class="table-light">
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
                   <td><?= $t['kategori_nama'] ?></td>

                    <td><?= ucfirst($t['tipe']) ?></td>
                    <td>Rp<?= number_format($t['nominal'], 0, ',', '.') ?></td>
                    <td>
                        <a href="/transaksi/edit/<?= $t['id'] ?>" class="btn btn-warning btn-sm">Edit</a>
                        <button class="btn btn-danger btn-sm" onclick="confirmDeleteTransaksi(<?= $t['id'] ?>)">Hapus</button>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function confirmDeleteTransaksi(id) {
    Swal.fire({
        title: 'Yakin ingin menghapus transaksi?',
        text: "Data yang dihapus tidak bisa dikembalikan!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#6c757d',
        confirmButtonText: 'Ya, hapus!',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            window.location.href = "/transaksi/delete/" + id;
        }
    })
}
</script>

<?= $this->endSection() ?>
