<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card shadow-sm p-4" style="width: 100%; max-width: 400px;">
        <h3 class="mb-4 text-center">Daftar Akun</h3>

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
                <input type="email" name="email" class="form-control" id="email" placeholder="email@example.com" required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Daftar</button>
        </form>

        <p class="mt-3 text-center">Sudah punya akun? <a href="/login">Login sekarang</a></p>
    </div>
</div>

<?= $this->endSection() ?>
