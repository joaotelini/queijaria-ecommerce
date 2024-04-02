<?php
    include_once ("connection-sql.php");

    $nm = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];
    $logradouro = $_POST["logradouro"];
    $numero = $_POST["numero"];
    $bairro = $_POST["bairro"];
    $celular = $_POST["celular"];

    if ($nm == "" || $email == "" || $senha == "" || $logradouro == "" || $numero == "" || $bairro == "" || $celular == "") {
        echo "Voce deixou algum campo vazio, volte para preencher corretamente.";
    } else {
        $sql = "INSERT INTO usuario (nome_completo, email, senha, logradouro, numero, bairro, celular) 
        VALUES ('$nm', '$email', '$senha', '$logradouro', '$numero', '$bairro', '$celular')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
}