<?php
    // Bootstrap navbar, exploded line by line and echoed out
    echo '<nav class="navbar sticky-top navbar-expand-lg navbar-light bg-primary">';
    echo '<div class="container-fluid">';
    echo '<a class="navbar-brand mx-auto" href="'. $GLOBALS['protocol'] . $_SERVER['HTTP_HOST']. '"><img src="' . $GLOBALS['protocol'] . $_SERVER['HTTP_HOST'] . '/assets/img/logo-white.png"></a>';
    echo '<div class="collapse navbar-collapse" id="navbarSupportedContent">';
    echo '<ul class="navbar-nav me-auto mb-2 mb-lg-0">';
    echo '</ul>';
    echo '</div>';
    echo '</div>';
    echo '</nav>';
