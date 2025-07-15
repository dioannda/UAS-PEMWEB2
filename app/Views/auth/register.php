<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<style>
    body {
        background: linear-gradient(135deg, #8A8D9A, #D8DBE9); /* Sama seperti login */
        font-family: 'Poppins', sans-serif;
    }

    .card-custom {
        background-color: rgba(255, 255, 255, 0.95);
        border-radius: 16px;
        box-shadow: 0 6px 18px rgba(0, 0, 0, 0.1);
    }

    .btn-purple {
        background-color: #8000ff;
        color: white;
        font-weight: 500;
        border: none;
    }

    .btn-purple:hover {
        background-color: #6700cc;
        color: white;
    }
</style>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card card-custom p-4" style="width: 100%; max-width: 400px;">
        <h3 class="mb-4 text-center" style="font-weight: 700; color: #8000ff;">Daftar Akun</h3>

        <?php if(session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
        <?php endif; ?>

        <form method="post" action="/register">
            <?= csrf_field() ?>

            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Anda" required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" placeholder="email@gmail.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-purple w-100">Daftar</button>
        </form>

        <p class="mt-3 text-center">Sudah punya akun? <a href="/login" style="color:#8000ff; font-weight: 500;">Login sekarang</a></p>
    </div>
</div>

<?= $this->endSection() ?>
