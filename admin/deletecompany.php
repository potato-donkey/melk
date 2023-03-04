<?php
include '../config.php';
include '../includes/db.php';

session_start();
if(isset($_SESSION['loggedin'])  && $_SESSION['loggedin'] = false) {
    header("Location: index.php");
}

if(isset($_GET['id']) && is_numeric($_GET['id'])){
    $id = $_GET['id'];
    deleteCompany($id);
    header("Location: dash.php?m=2");
}