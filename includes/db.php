<?php
include_once 'config.php';
$db = new mysqli_connect($GLOBALS['db_host'], $GLOBALS['db_user'], $GLOBALS['db_pass'], $GLOBALS['db_name']);
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}
?>