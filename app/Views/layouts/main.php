<!DOCTYPE html>
<html>

<head>
    <title>Dashboard - Aplikasi Keuangan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #8A8D9A, #D8DBE9);
            font-family: 'Poppins', sans-serif;
            min-height: 100vh;
            margin: 0;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.95);
            /* Putih transparan */
            border-radius: 16px;
            padding: 30px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }

        .table {
            background-color: white;
            border-radius: 8px;
            overflow: hidden;
        }

        .table-header-finote th {
            background-color: #130517ff !important;
            color: white !important;
        }

        .table-rounded {
            border-radius: 10px;
            overflow: hidden;
        }

        .table td,
        .table th {
            vertical-align: middle;
            padding: 12px;
        }
    </style>

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


</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" href="/">
                <img src="<?= base_url('assets/img/fn1.png') ?>" alt="Logo" height="36" class="me-2">
                <h3 class="mb-0"
                    style="font-family: 'Poppins', sans-serif; font-weight: 700; letter-spacing: 1px; font-size: 32px;">
                    <span style="color: rgb(197, 6, 250);">F</span><span class="shiny-text">inote</span>
                </h3>
            </a>

            <div class="ms-auto">
                <a href="/logout" class="btn btn-light btn-logout-custom rounded-pill px-4 py-1"
                    style="font-weight: 600; color: rgb(197, 6, 250);">
                    Logout
                </a>



            </div>
        </div>
    </nav>

    <?= $this->renderSection('content') ?>

</body>

</html>