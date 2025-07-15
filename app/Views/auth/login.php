<?= $this->extend('layouts/auth') ?>
<?= $this->section('content') ?>

<div class="container login-container d-flex justify-content-center align-items-center">
    <div class="row shadow rounded overflow-hidden" style="width: 900px;">
       
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
        <label for="email" class="form-label">Alamat Email</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-envelope-fill"></i></span>
            <input type="email" name="email" id="email" class="form-control" placeholder="Masukkan Alamat Email" required>
        </div>
    </div>

    <div class="mb-3">
        <label for="password" class="form-label">Kata Sandi</label>
        <div class="input-group">
            <span class="input-group-text"><i class="bi bi-lock-fill"></i></span>
            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Kata Sandi" required>
            <span class="input-group-text" style="cursor: pointer;" onclick="togglePassword()">
                <i class="bi bi-eye-slash" id="toggleIcon"></i>
            </span>
        </div>
    </div>

    <div class="d-grid mb-3">
        <button type="submit" class="btn btn-purple w-100">Masuk</button>
    </div>

    <p class="text-center text-white mt-3 mb-1">ATAU</p>


    <div class="text-center mt-3">
        <div class="text-white mt-3">
    <p class="mb-1 text-center">Belum punya akun?</p>
    <div class="text-center">
        <a href="/register" class="btn btn-outline-light btn-sm px-4 rounded-pill" style="border-color: #c08bff; color: #c08bff;">
            Daftar Sekarang
        </a>
    </div>
</div>


    </div>
     
</form>

            </form>
        </div>

        
        <div class="col-md-6 login-right p-0 position-relative">
    
    <img src="<?= base_url('assets/img/dompet.jpg') ?>" alt="Dompet" class="img-fluid h-100 w-100"
        style="object-fit: cover; filter: brightness(0.95);">

    <div class="position-absolute bottom-0 start-50 translate-middle-x text-white text-center px-3 py-4" style="z-index: 2;">
      
<p class="mb-0 fancy-text" style="font-size: 14px;">
    Dengan <span class="highlight-brand">Finote</span>, semua jadi lebih mudah.
</p>


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
<style>
    .btn-purple {
        background-color: #8000ff;
        color: white;
        font-weight: 500;
        border: none;
    }

    .btn-purple:hover {
        background-color: #6a00cc;
        color: white;
    }

    .input-group-text {
        background-color: #f0f0f0;
        border: 1px solid #ced4da;
    }

    .form-control:focus {
        border-color: #8000ff;
        box-shadow: 0 0 0 0.2rem rgba(128, 0, 255, 0.25);
    }
</style>
<style>
.fancy-text {
    animation: fadeUp 1s ease-out;
    font-family: 'Poppins', sans-serif;
    color: #ffffff;
    letter-spacing: 0.5px;
    text-align: center;
}

.highlight-brand {
    color: #a020f0;
    font-weight: 600;
    text-shadow: 0 0 5px rgba(160, 32, 240, 0.6);
    transition: color 0.4s ease;
}

.highlight-brand:hover {
    color: #c946f8;
    text-shadow: 0 0 8px rgba(160, 32, 240, 0.9);
}


@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
<style>
.fancy-text {
    animation: fadeUp 1s ease-out;
    font-family: 'Poppins', sans-serif;
    color: #fff;
    letter-spacing: 0.5px;
    text-align: center;
}

.highlight-brand {
    color: #a020f0;
    font-weight: 600;
    text-shadow: 0 0 5px rgba(160, 32, 240, 0.8),
                 0 0 10px rgba(160, 32, 240, 0.6),
                 0 0 15px rgba(160, 32, 240, 0.4);
    animation: glowBlink 2s infinite alternate;
}
@keyframes fadeUp {
    from {
        opacity: 0;
        transform: translateY(15px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}


@keyframes glowBlink {
    0% {
        text-shadow: 0 0 5px rgba(160, 32, 240, 0.3),
                     0 0 10px rgba(160, 32, 240, 0.2);
    }
    100% {
        text-shadow: 0 0 10px rgba(160, 32, 240, 0.9),
                     0 0 20px rgba(160, 32, 240, 0.7),
                     0 0 30px rgba(160, 32, 240, 0.5);
    }
}
</style>

<script>
    function togglePassword() {
        const passwordInput = document.getElementById('password');
        const toggleIcon = document.getElementById('toggleIcon');

        if (passwordInput.type === 'password') {
            passwordInput.type = 'text';
            toggleIcon.classList.remove('bi-eye-slash');
            toggleIcon.classList.add('bi-eye');
        } else {
            passwordInput.type = 'password';
            toggleIcon.classList.remove('bi-eye');
            toggleIcon.classList.add('bi-eye-slash');
        }
    }
</script>

<?= $this->endSection() ?>