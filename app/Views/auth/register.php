<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Register</h2>
    <form method="post" action="/register">
        <?= csrf_field() ?>
        <input type="text" name="nama" placeholder="Nama" class="form-control mb-2" required>
        <input type="email" name="email" placeholder="Email" class="form-control mb-2" required>
        <input type="password" name="password" placeholder="Password" class="form-control mb-2" required>
        <button type="submit" class="btn btn-success">Daftar</button>
    </form>
    <p>Sudah punya akun? <a href="/login">Login</a></p>
</div>
<?= $this->endSection() ?>
