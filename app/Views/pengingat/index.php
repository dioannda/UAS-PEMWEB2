<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <!-- Tombol Back di atas judul -->
    <div class="d-flex justify-content-between align-items-center mb-3">
        <a href="/dashboard" class="btn btn-danger">← Back</a>
        <h2 class="mb-0">Pengingat Pembayaran</h2>
        <div></div> <!-- agar judul tetap di tengah -->
    </div>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>

    <a href="/pengingat/create" class="btn btn-success mb-3">+ Tambah Pengingat</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Deskripsi</th>
                <th>Tanggal Pembayaran</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
            <?php
            $tanggalHariIni = date('Y-m-d');
            foreach ($pengingat as $item):
                $tanggalPengingat = $item['tanggal_pembayaran'];
                $status = $item['status'];

                if ($status === 'belum' && $tanggalPengingat < $tanggalHariIni) {
                    $statusTampil = '<span class="text-danger fw-bold">Terlambat</span>';
                } elseif ($status === 'belum') {
                    $statusTampil = '<span class="text-warning">Belum</span>';
                } else {
                    $statusTampil = '<span class="text-success">Selesai</span>';
                }
                ?>
                <tr>
                    <td><?= esc($item['deskripsi']) ?></td>
                    <td><?= esc($item['tanggal_pembayaran']) ?></td>
                    <td><?= $statusTampil ?></td>
                    <td>
                        <?php if ($item['status'] === 'belum'): ?>
                            <a href="/pengingat/selesai/<?= $item['id'] ?>" class="btn btn-sm btn-success">Selesai</a>
                        <?php endif; ?>
                        <a href="/pengingat/edit/<?= $item['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                        <a href="#" onclick="confirmDelete(<?= $item['id'] ?>)" class="btn btn-sm btn-danger">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>

<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data ini tidak bisa dikembalikan!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `/pengingat/delete/${id}`;
            }
        });
    }
</script>

<?= $this->endSection() ?>