<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Vérification Email</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f7f9fc; padding: 20px; }
        .container {
            max-width: 600px;
            background: #fff;
            padding: 30px;
            margin: auto;
            border-radius: 10px;
            box-shadow: 0 0 10px #ccc;
            text-align: center;
        }
        .code {
            font-size: 32px;
            color: #007BFF;
            font-weight: bold;
            margin: 20px 0;
        }
        .footer {
            font-size: 12px;
            color: #999;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bonjour {{ $user->name }},</h2>
        <p>Merci de vous être inscrit ! Voici votre code de vérification :</p>
        <div class="code">{{ $code }}</div>
        <p>Entrez ce code sur le site pour valider votre inscription.</p>
        <div class="footer">
            Cet e-mail vous a été envoyé automatiquement. Ne répondez pas.
        </div>
    </div>
</body>
</html>
