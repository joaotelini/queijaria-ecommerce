<?php
    require ("connection-sql.php");

    // Protecao nos campos do formulario

    $nm = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $hash = password_hash($senha, PASSWORD_DEFAULT);
    $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $celular = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

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
            header("Location: ../pages/cad.html");
            exit();
        } 
        else {
            echo "Error: " . $inserir . "<br>" . $conn->error;
        }