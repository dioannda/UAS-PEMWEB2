<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Ringkasan Keuangan Bulan Ini</h2>
        <div>
            <a href="/laporan" class="btn btn-outline-primary me-2">📄 Lihat Laporan</a>
            <a href="/transaksi/" class="btn btn-success">+ Tambah Transaksi</a>
            <a href="/pengingat" class="btn btn-outline-secondary me-2">🔔 Pengingat Pembayaran</a>

        </div>
    </div>

   
        <div class="alert alert-warning d-flex align-items-center gap-2">
            <i class="bi bi-exclamation-triangle-fill"></i>
            <div>Hai <?= session()->get('nama') ?>, kamu belum mencatat transaksi hari ini. Yuk catat sekarang!
                <a href="/transaksi/create" class="btn btn-sm btn-warning ms-2">+ Catat Sekarang</a>
            </div>
        </div>
    

    <div class="row">
        <div class="col-md-4">
            <a href="/transaksi/pemasukan" class="text-decoration-none">
    <div class="card bg-success text-white mb-3">
        <div class="card-body">
            <h5 class="card-title">Pemasukan</h5>
            <p class="card-text">Rp<?= number_format($pemasukan, 0, ',', '.') ?></p>
        </div>
    </div>
</a>

        </div>
        <div class="col-md-4">
            <a href="/transaksi/pengeluaran" class="text-decoration-none">
    <div class="card bg-success text-white mb-3">
        <div class="card-body">
            <h5 class="card-title">Pengeluaran</h5>
            <p class="card-text">Rp<?= number_format($pengeluaran, 0, ',', '.') ?></p>
        </div>
    </div>
</a>

        </div>
        <div class="col-md-4">
            <a href="/transaksi/saldo" class="text-decoration-none">
    <div class="card bg-success text-white mb-3">
        <div class="card-body">
            <h5 class="card-title">Saldo Saat Ini</h5>
            <p class="card-text">Rp<?= number_format($saldo, 0, ',', '.') ?></p>
        </div>
    </div>
</a>

        </div>
    </div>


    <h4 class="mt-5">Grafik Keuangan Bulan Ini</h4>
    <canvas id="grafikKeuangan"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('grafikKeuangan');
    const grafik = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Pemasukan', 'Pengeluaran'],
            datasets: [{
                label: 'Jumlah (Rp)',
                data: [<?= $pemasukan ?>, <?= $pengeluaran ?>],
                backgroundColor: ['green', 'red'],
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
</script>

<style>
    body {
        background: linear-gradient(135deg, #8A8D9A, #D8DBE9);
        font-family: 'Poppins', sans-serif;
    }

    .container {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }
</style>
<style>
    .btn-logout-custom:hover {
        background-color: rgb(197, 6, 250);
        color: white !important;
    }
</style>

<?= $this->endSection() ?>