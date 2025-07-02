<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification Email</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS + Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Ton fichier CSS personnalisé -->
    <link rel="stylesheet" href="{{ asset('css/a.css') }}">
    
    <style>
        /* Même style que ton formulaire */
        body {
            min-height: 100vh;
            background: linear-gradient(90deg, #e2e2e2, #c9d6ff);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .form-box {
            border-radius: 15px;
            width: 25%;
            background: white;
            padding: 40px;
            box-shadow: 0 0 30px rgba(0, 0, 0, .2);
            color: #333;
        }

        .input-box {
            margin: 30px 0;
            position: relative;
        }

        .input-box input {
            width: 100%;
            padding: 13px 50px 13px 20px;
            background: #eee;
            border-radius: 8px;
            border: none;
            outline: none;
            font-size: 16px;
            font-weight: 500;
        }

        .input-box i {
            position: absolute;
            right: 10px;
            top: 35%;
            transform: translateY(-50%);
            font-size: 20px;
            color: #888;
        }

        .btn {
            width: 100%;
            height: 48px;
            border-radius: 8px;
            background: #7494ec !important;
            border: none;
            font-size: 16px;
            color: #fff;
            font-weight: 600;
        }

        .error {
            color: red;
            font-size: 14px;
            margin-bottom: 10px;
        }

    </style>
</head>
<body>
    <div class="form-box">
        <form method="POST" action="/verify">
            @csrf
            <h1 class="text-center">Vérification</h1>

            @if (session('error'))
                <div class="error">{{ session('error') }}</div>
            @endif

            <div class="input-box">
                <input type="email" name="email" placeholder="Adresse e-mail" value="{{ old('email', session('email')) }}" required>
                <i class="bi bi-envelope-fill"></i>
            </div>

            <div class="input-box">
                <input type="text" name="code" placeholder="Code de vérification" required>
                <i class="bi bi-shield-lock-fill"></i>
            </div>

            <button type="submit" class="btn">Vérifier</button>
        </form>
    </div>
</body>
</html>
