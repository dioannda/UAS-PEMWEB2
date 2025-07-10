<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login - Finote</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@500;600&display=swap" rel="stylesheet">


    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #D8DBE9, #CBCEDC, #BEC1CF);
            min-height: 100vh;
        }


        .login-container {
            min-height: 100vh;
        }

        .login-left {
            background-color: #1e1e2f;
            color: #fff;
            padding: 4rem;
            border-top-left-radius: 1rem;
            border-bottom-left-radius: 1rem;
        }

        .login-right {
            background-color: #d8dbe9;
            display: flex;
            align-items: center;
            justify-content: center;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            position: relative;
        }

        .login-logo {
            font-size: 1.8rem;
            font-weight: 600;
        }

        .wallet-illustration {
            max-width: 300px;
        }

        .subtitle {
            font-size: 1rem;
            color: #aaa;
        }

        .tagline {
            position: absolute;
            bottom: 2rem;
            right: 2rem;
            font-weight: 500;
        }

        .form-control {
            border-radius: 0.5rem;
        }

        .btn-primary {
            background-color: #6366f1;
            border: none;
        }
    </style>
</head>

<body>
    <?= $this->renderSection('content') ?>
</body>

</html>