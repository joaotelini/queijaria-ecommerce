<?php
    require ("connection-sql.php");

    // Protecao nos campos do formulario
    $nm = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $hash = password_hash($senha, PASSWORD_DEFAULT); // Gerar o hash da senha
    $logradouro = filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_SPECIAL_CHARS);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_SPECIAL_CHARS);
    $celular = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_SPECIAL_CHARS);

    // Verificar se o e-mail já existe
    $sqlVerificaEmail = "SELECT * FROM usuario WHERE email = ?";
    $stmtVerificaEmail = $conn->prepare($sqlVerificaEmail);
    $stmtVerificaEmail->bind_param("s", $email);
    $stmtVerificaEmail->execute();
    $resultadoVerificaEmail = $stmtVerificaEmail->get_result();

    // Verificar se houve resultados na consulta (se o e-mail já está cadastrado)
    if ($resultadoVerificaEmail->num_rows > 0) {
        echo "Este email já existe";
    } else {
        // Se o e-mail não existir, inserir o novo usuário no banco de dados
        $sqlInserirUsuario = "INSERT INTO usuario (nome_completo, email, senha, logradouro, numero, bairro, celular) 
            VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmtInserirUsuario = $conn->prepare($sqlInserirUsuario);
        $stmtInserirUsuario->bind_param("sssssss", $nm, $email, $hash, $logradouro, $numero, $bairro, $celular);
        
        if ($stmtInserirUsuario->execute()) {
            header("Location: ../pages/cad.html");
            exit();
        } else {
            echo "Error: " . $conn->error;
        }

        // Fechar as declarações preparadas
        $stmtVerificaEmail->close();
        $stmtInserirUsuario->close();
    }

    // Fechar a conexão com o banco de dados (opcional)
    $conn->close();
