<?php
include 'includes/db.php';
$id = $_GET['id'];
if($id == null || !is_numeric($id)) {
    header("Location: index.php");
}

$company = getCompanyById($id);
if($company == null) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="nl">
<head>
    <title><?= $company['name']; ?> | melk.</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>
<body>
<?php include_once 'includes/navbar.php'; ?>
<div class="container-fluid pt-5 ps-5">
    <h1><?= $company['name']; ?></h1>
    <p class="text-secondary fst-italic"><?= $company['address']; ?>, <?= $company['place']; ?></p>

    <h2>Info</h2>
    <p class="text-secondary"><?= $company['notes'] ?: 'Geen extra informatie' ?></p>

    <h2>Afbeeldingen</h2>
</div>
</body>
</html>

