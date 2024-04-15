<?php
    require ('connection-sql.php');
    
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * from usuario where email = '$email' and senha = '$senha'";
    $consulta = $conn->query($sql) or die("". $conn->error);
    $verificacaoDElogin = $consulta->num_rows;

    if ($verificacaoDElogin == 1) {
        header('Location: index.php');
    }else{
        echo "usuario nao encontrado";
    }