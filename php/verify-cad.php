<?php
    require ("connection-sql.php");

    $nm = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $celular = $_POST["phone"];

    $emailExiste = "SELECT * FROM usuario WHERE email = '{$email}'";

    $inserir = "INSERT INTO usuario (nome_completo, email, senha, logradouro, numero, bairro, celular) 
    VALUES ('$nm', '$email', '$senha', '$logradouro', '$numero', '$bairro', '$celular')";

    $result = $conn->query($emailExiste);

    
    if ($nm == "" || $email == "" || $senha == "" || $logradouro == "" || $numero == "" || $bairro == "" || $celular == "") {
        echo "Voce deixou algum campo vazio, volte para preencher corretamente.";
    }
    else if ($result->num_rows > 0) {
            echo "Este email ja existe";
    }
    else if ($conn->query($inserir) === TRUE){
            echo "Voce foi cadastrado com sucesso!";
        } 
        else {
            echo "Error: " . $inserir . "<br>" . $conn->error;
        }