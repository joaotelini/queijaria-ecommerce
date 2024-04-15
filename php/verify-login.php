<?php
    require ('connection-sql.php');
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sqlSenha = "SELECT * FROM usuario WHERE senha = '{$senha}'";
    $sqlEmail = "SELECT * FROM usuario WHERE email = '{$email}'";

    if ($email = "" || $senha == "") {
        echo "Voce deixou algum campo vazio";
    }

    if ($senha = $conn->query($sqlSenha)) {
        echo "<br>senha correta";
    }
    else {
        echo "<br>esta senha nao existe";
    }
    if ($email = $conn->query($sqlEmail)) {
        echo "<br>email  correto";
    }
    else {
        echo "<br>este email nao existe";
    }