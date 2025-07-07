<?= $this->extend('layouts/main') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Selamat datang, <?= session()->get('user_nama') ?></h2>
    <p>Ini adalah halaman dashboard.</p>
    <a href="/logout" class="btn btn-danger">Logout</a>
</div>
<?= $this->endSection() ?>
