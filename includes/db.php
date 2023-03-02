<?php
include_once 'config.php';
$db = mysqli_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

function getCompanies() {
    global $db;
    $sql = "SELECT * FROM companies";
    $result = $db->query($sql);
    $companies = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $companies[] = $row;
        }
    }
    return $companies;
}

function getCompanyById($id) {
    global $db;
    $sql = "SELECT * FROM companies WHERE companyid = " . $id;
    $result = $db->query($sql);
    $company = null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $company = $row;
        }
    }
    return $company;
}

function getImagesById($id) {
    global $db;
    $sql = "SELECT * FROM images WHERE companyid = " . $id;
    $result = $db->query($sql);
    $images = array();
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $images[] = $row;
        }
    }
    return $images;
}
?>