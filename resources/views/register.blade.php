<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inscription</title>
        <link rel="stylesheet" href="{{ asset('css/a.css') }}">
    </head>
    <body class="d-flex align-items-center justify-content-center">
        <div class="form-box login">
        @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
            <form method="POST" autocomplete="off" action="/register">
                @csrf
                <h1 class="text-center">Inscription</h1>
            <div class="input-box position-relative">
                <input type="text" name="name" placeholder="Nom">
                <i class="bi bi-person-fill"></i>
            </div>
            <div class="input-box position-relative">
                <input type="text" name="email" placeholder="Adresse e-mail">
                <i class="bi bi-envelope-fill"></i>

            </div>
            <div class="input-box position-relative">
                <input type="password" name="password" placeholder="Mot de passe">
                <i class="bi bi-lock-fill"></i>
            </div>
            <button type="submit"  class="btn submit">S'inscrire</button>
            <a href="connexion.php" class="mt-4 text-decoration-none position-relative top-100" style="top: 15px">J'ai déja un compte!!</a>
            <p style="margin: 20px 0;" class="text-center">ou continuer avec</p>
            <div class="social-icons d-flex justify-content-center">
                <a href="#"><i class="bi bi-google"></i></a>
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-github"></i></a>
                <a href="#"><i class="bi bi-twitter-x"></i></a>
            </div>
        </form>
    </div>
</body>
</html>
<script>
    const nom = document.querySelector("#nom");
    const regex = /^[a-zA-Z\s]*$/;
    nom.addEventListener("input", () =>{
        let valeur = nom.value;
        if(!regex.test(valeur)){
            valeur = valeur.replace(/[^a-zA-Z\s]/g, '');
            nom.value = valeur;
        }
    })
</script>