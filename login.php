<?php
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title>melk.</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>
<body class="bg-primary">
    <div class="container-fluid text-center pt-5">
        <img src="assets/img/logo-white.png" alt="melk.">
        <form class="mt-2" action="index.php">
            <div class="mb-3">
                <input type="text" class="form-control-lg" id="username" placeholder="Gebruikersnaam">
            </div>
            <div class="mb-3">
                <input type="password" class="form-control-lg" id="password" placeholder="Wachtwoord">
            </div>
            <button type="submit" class="btn btn-light">Login</button>
        </form>
    </div>
</body>