
<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Login</h2>
    <?php if(session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form method="post" action="/login">
        <?= csrf_field() ?>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <p>Belum punya akun? <a href="/register">Daftar</a></p>
</div>
<?= $this->endSection() ?>
