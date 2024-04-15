<?php
    require ('connection-sql.php');
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // $sqlSenha = "SELECT * FROM usuario WHERE senha = '{$senha}'";
    $sql = "SELECT * from usuario where email = '{$email}' and senha = '{$senha}'";
    // $sqlEmail = "SELECT * FROM usuario WHERE email = '{$email}'";

    if ($email = "" || $senha == "") {
        echo "Voce deixou algum campo vazio";
    }
    else {
        if ($email and $senha = $conn->query($sql)) {
            echo "usuario existe";
        }
        else {
            echo "nao existe";
        }
    }