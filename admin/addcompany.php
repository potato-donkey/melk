<?php
include '../config.php';
include '../includes/db.php';

session_start();
if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] = false) {
    header("Location: index.php");
}

if(isset($_POST['code']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['city']) && isset($_POST['description'])) {
    $code = $_POST['code'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $description = $_POST['description'];
    if(isset($_FILES['images'])) {
        echo print_r($_FILES['images']);	
    }

    addCompany($code, $name, $address, $city, $description);

    for($i = 0; $i < count($_FILES['images']['name']); $i++) {
        $image = $_FILES['images']['name'][$i];
        $tmp = $_FILES['images']['tmp_name'][$i];
        $ext = pathinfo($image, PATHINFO_EXTENSION);
        $newName = uniqid() . '.' . $ext;
        $target = '../assets/uploads/' . $newName;
        move_uploaded_file($tmp, $target);
        addImage($code, $newName);
    }
    
    header("Location: dash.php?m=1");
}
?>

<!DOCTYPE html>
<html lang="nl">

<head>
    <title>bedrijf toevoegen | melk.</title>
    <link rel="stylesheet" href="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/css/style.css">
    <script src="<?= $GLOBALS['links'] . $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>

<body>
    <?php include_once '../includes/navbar.php'; ?>
    <?php include_once '../includes/banner.php'; ?>

    <div class="container-fluid text-center pt-5">
        <h1 class="fw-bold">Bedrijf toevoegen</h1>
        <form action="./addcompany.php" method="POST" enctype="multipart/form-data">
            <input type="text" class="form-control-md fs-1em py-2 px-3 mt-3" id="code" name="code" placeholder="Code">
            <input type="text" class="form-control-md fs-1em py-2 px-3 mt-3" id="name" name="name" placeholder="Naam">
            <input type="text" class="form-control-md fs-1em py-2 px-3 mt-3" id="address" name="address"
                placeholder="Adres">
            <input type="text" class="form-control-md fs-1em py-2 px-3 mt-3" id="city" name="city" placeholder="Plaats">
            <textarea class="form-control-md fs-1em py-2 px-3 mt-3" id="description" name="description" rows="8"
                placeholder="Vrije tekst"></textarea>

            <input type="file" class="form-control-md fs-1em py-2 px-3 mt-3" id="images" name="images[]"
                placeholder="Afbeeldingen" accept="image/png, image/jpeg" multiple>

            <button type="submit" class="btn btn-primary fs-1em px-5 py-2 mt-3">Toevoegen</button>
        </form>
    </div>
</body>