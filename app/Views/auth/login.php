<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<div class="container login-container d-flex justify-content-center align-items-center">
    <div class="row shadow rounded overflow-hidden" style="width: 900px;">
        <!-- Kiri -->
        <div class="col-md-6 login-left">
            <div class="mb-4 d-flex align-items-center gap-2">
                <img src="<?= base_url('assets/img/fn1.png') ?>" alt="Finote Logo" style="height: 48px; width: auto;">

                <h2 class="mb-0"
    style="font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: 1px; font-size: 40px;">
    <span style="color: rgb(197, 6, 250);">F</span><span class="shiny-text">inote</span>
</h2>

            </div>



            <h3 class="mb-1">Welcome back</h3>
            <p class="subtitle mb-4">Kelola KeuanganMu bersama Finote</p>

            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
            <?php endif; ?>

            <form method="post" action="/login">
                <?= csrf_field() ?>
                <div class="mb-3">
                    <input type="email" name="email" class="form-control" placeholder="Masukkan Alamat Email" required>

                </div>

                <div class="mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Masukkan Kata Sandi" required>

                </div>

                <div class="d-grid mb-2">
                    <button type="submit" class="btn btn-primary">Masuk</button>
                </div>

                <p class="text-center text-muted mt-3 mb-1">OR</p>

                <div class="text-center mt-3">
                    <small class="text-muted">Don't have an account yet? <a href="/register" class="text-info">Daftar
                            Sekarang</a></small>
                </div>
            </form>
        </div>

        <!-- Kanan -->
        <!-- Kanan -->
        <div class="col-md-6 login-right p-0">
            <div class="h-100 w-100">
                <img src="<?= base_url('assets/img/dompet.jpg') ?>" alt="Dompet" class="img-fluid h-100 w-90"
                    style="object-fit: cover;">
            </div>
        </div>

    </div>
</div>
<style>
    .shiny-text {
        background: linear-gradient(90deg, #ffffff, #bbbbbb, #ffffff);
        background-size: 200% auto;
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        animation: shine 2s linear infinite;
    }

    @keyframes shine {
        0% {
            background-position: 200% center;
        }
        100% {
            background-position: -200% center;
        }
    }
</style>

<?= $this->endSection() ?>