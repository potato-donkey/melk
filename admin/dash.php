<?php
include '../config.php';
include '../includes/db.php';

session_start();
if(isset($_POST['password'])) {
    if(compareAdminPassword($_POST['password'])) {
        $_SESSION['loggedin'] = true;
        header("Location: dash.php");
    } else {
        header("Location: index.php?e=1");
    }
}

if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] = false) {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <title>administratie | melk.</title>
    <link rel="stylesheet" href="<?= $GLOBALS['protocol'] . $_SERVER['HTTP_HOST']; ?>/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= $GLOBALS['protocol'] . $_SERVER['HTTP_HOST']; ?>/assets/css/style.css">
    <script src="<?= $GLOBALS['protocol'] . $_SERVER['HTTP_HOST']; ?>/assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>

<body>
    <?php include_once '../includes/navbar.php'; ?>
    <?php include_once '../includes/banner.php'; ?>

    <?php
    if(isset($_GET['m'])){
        $m = $_GET['m'];
        if ($m == 1) {
            echo '<div class="alert alert-success" role="alert"><i class="bi bi-check"></i>&nbsp;Bedrijf toegevoegd</div>';
        }

        if ($m == 2) {
            echo '<div class="alert alert-success" role="alert"><i class="bi bi-check"></i>&nbsp;Bedrijf verwijderd</div>';
        }
    }
    ?>

    <div class="container-fluid text-center pt-5">
        <h1 class="fw-bold">Administratie</h1>
        <small><a href="logout.php">Uitloggen</a></small>

        <h1 class="mt-5">Overzicht</h1>
        <a class="btn btn-success fs-1 mb-3" href="addcompany.php"><i class="bi bi-plus"></i>&nbsp;Toevoegen</a><br>
        <input type="text" id="searchInput" placeholder="Zoeken op code..." class="form-control-sm fs-1em py-2 px-3">
        <table class="table" id="companiesTable">
            <thead>
                <tr>
                    <th>Code</th>
                    <th>Naam</th>
                    <th>Acties</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $companies = getCompanies();
                foreach ($companies as $company) {
                    echo '<tr>';
                    echo '<td>' . $company['companyid'] . '</td>';
                    echo '<td>' . $company['name'] . '</td>';
                    echo '<td><a href="editcompany.php?id=' . $company['companyid'] . '">Bewerken</a><br><a href="#" class="text-danger" onclick="confirmDelete(\'deletecompany.php?id=' . $company['companyid'] . '\')">Verwijderen</a></td>';
                    echo '</tr>';
                }
                ?>
        </table>
    </div>
    <script>
    // Search function for table with id companiesTable without jQuery
    function searchTable() {
        let input, filter, table, tr, td, i, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.getElementById("companiesTable");
        tr = table.getElementsByTagName("tr");
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
    document.getElementById("searchInput").addEventListener("keyup", searchTable);

    function confirmDelete(url) {
        if (confirm("Weet je zeker dat je dit bedrijf (en alle bijbehorende afbeeldingen) wilt verwijderen?")) {
            window.location.href = "<?= $GLOBALS['protocol'] . $_SERVER['HTTP_HOST'] ?>/admin/" + url;
        }
    }
    </script>
</body>

</html>