<?php
include 'includes/db.php';
?>
<!DOCTYPE html>
<html>
<head>
    <title>melk.</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <script src="assets/js/bootstrap.bundle.min.js" defer></script>
    <meta viewport="width=device-width, initial-scale=1">
</head>
<body>
    <?php include_once 'includes/navbar.php'; ?>
    <input class="form-control searchbar" name="search" id="search" type="text" placeholder="Zoek op naam, plaatsnaam of code" aria-label="Zoeken">
    <div class="container-fluid">
        <div class="list-group mt-3">
            <?php
            $companies = getCompanies();

            foreach ($companies as $company) {
                echo '<a href="info.php?id=' . $company['companyid'] . '" class="list-group-item list-group-item-action"><span class="badge bg-secondary fs-1">' . $company['companyid'] . '</span> <b>' . $company['name'] . '</b>
                <i class="bi bi-arrow-right-circle-fill text-primary float-end"></i><br><small class="text-secondary fst-italic">' . $company['address'] . ', ' . $company['place'] . '</small></a>';
            }
            ?>
        </div>
    </div>

<script>
    const search = document.getElementById('search');
    search.addEventListener('keyup', (e) => {
        const searchString = e.target.value.toLowerCase();

        const companies = document.querySelectorAll('.list-group-item');
        const companiesArray = Array.from(companies);

        companiesArray.forEach((company) => {
            const name = company.querySelector('b').textContent.toLowerCase();
            const place = company.querySelector('small').textContent.toLowerCase();
            const id = company.querySelector('span.badge').textContent.toLowerCase();

            if (name.includes(searchString) || place.includes(searchString) || id.includes(searchString)) {
                company.style.display = 'block';
            } else {
                company.style.display = 'none';
            }
        });
    });
</script>
</body>
</html>

