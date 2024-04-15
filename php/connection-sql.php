<?php
    $host = "localhost";
    $db = "db_sitio3irmaos";
    $user = "root";
    $pass = "";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->error) {
        die($conn->connect_error);
    }