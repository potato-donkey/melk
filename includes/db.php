<?php
//include_once 'config.php';
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

function getSystemMessage() {
    global $db;
    $sql = "SELECT * FROM sys";
    $result = $db->query($sql);
    $message = null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $message = $row['bannermessage'];
        }
    }
    return $message;
}

function compareAdminPassword($password) {
    global $db;
    $sql = "SELECT * FROM sys";
    $result = $db->query($sql);
    $hash = null;
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $hash = $row['adminpass'];
        }
    }
    return password_verify($password, $hash);
}

function addCompany($code, $name, $address, $city, $description) {
    global $db;
    $sql = "INSERT INTO companies (companyid, name, address, place, notes) VALUES ('" . $code . "', '" . $name . "', '" . $address . "', '" . $city . "', '" . $description . "')";
    $db->query($sql);
}

function deleteCompany($id) {
    global $db;
    $sql = "DELETE FROM companies WHERE companyid = " . $id;
    $db->query($sql);
}