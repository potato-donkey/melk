<?php
include_once 'db.php';
$bannerMessage = getSystemMessage();
if($bannerMessage != null) {
    echo '<div class="alert alert-danger fade show fs-1 fw-bold" role="alert">';
    echo '<i class="bi bi-exclamation-circle"></i>&nbsp;';
    echo $bannerMessage;
    echo '</div>';
}