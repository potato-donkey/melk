<?php
include '../config.php';
include '../includes/db.php';

session_start();
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']) {
    header("Location: dash.php");
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>inloggen | melk.</title>
    <link rel="stylesheet" href="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/css/style.css">
    <script src="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>

<body>
    <?php include_once '../includes/navbar.php'; ?>
    <?php include_once '../includes/banner.php'; ?>
    <div class="container-fluid text-center pt-5">
        <?php
        if(isset($_GET['e'])){
            $e = $_GET['e'];
            if ($e == 1) {
                echo '<div class="alert alert-danger" role="alert">Wachtwoord is onjuist</div>';
            }
        }
        ?>
        <h1 class="fw-bold">Administratie</h1>
        <form class="mt-5" action="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST'] ?>/admin/dash.php" method="post">
            <div class="mb-5">
                <input type="password" class="form-control-md fs-1em py-2 px-3" id="password" name="password"
                    placeholder="Wachtwoord">
            </div>
            <button type="submit" class="btn btn-primary fs-1em px-5 py-2">Inloggen</button>
        </form>
    </div>
</body>

</html>