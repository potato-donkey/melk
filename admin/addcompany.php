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
    addCompany($code, $name, $address, $city, $description);
    header("Location: dash.php?m=1");
}