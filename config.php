<?php

    //$database = new mysqli("localhost","root","root","shoppure");
    $database = new mysqli("localhost","ricomtrc_caps24","RAjj]cmad!f*","ricomtrc_caps24");
    // Check connection
    if ($database->connect_errno) {
        echo "Failed to connect to MySQL: " . $database->connect_error;
        exit();
    }

