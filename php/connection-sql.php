<?php
    $host = "localhost";
    $db = "db_sitio3irmaos";
    $user = "root";
    $pass = "";

    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_errno) {
        die($conn->connect_error);
    }

    $sql = "SELECT * FROM usuario";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "Nome: " . $row["nome_completo"] . 
            " - E-mail: " . $row["email"] . 
            " - Logradouro: " . $row["logradouro"] .
            " @ " . $row ["numero"] .
            " - Bairro : " . $row["bairro"] .
            " - Celular: " . $row ["celular"];
        }
    } else {
        echo "0 results";
    }

    $conn->close();