<?php

    require_once 'config.php';

    session_start();

    $id = $_SESSION['id'];

    $res = $database->query("SELECT * FROM users WHERE id='$id'");

    $auth = $res->fetch_assoc();