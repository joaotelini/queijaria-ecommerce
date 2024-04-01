<?php
        $host = "localhost";
        $db = "db_sitio3irmaos";
        $user = "root";
        $pass = "";

        $mysqli = new mysqli($host, $user, $pass, $db);
        if ($mysqli->connect_errno) {
            echo "Falhou: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
        }