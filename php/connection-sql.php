<?php
    $host = "localhost";
    $db = "id22020141_db_sitio3irmaos";
    $user = "id22020141_admin";
    $pass = "Joaopedro@12";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_errno) {
        die($conn->connect_error);
    }