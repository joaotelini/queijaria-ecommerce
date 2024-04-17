<?php
    require ('connection-sql.php');

    session_start();

    $email = filter_input(INPUT_POST, 'email');
    $senha = $_POST["senha"];

    $sql = "SELECT nome_completo, email, logradouro, numero, celular, senha FROM usuario WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result && $result->num_rows == 1) {
        // Se o usuário com o e-mail fornecido foi encontrado
        $row = $result->fetch_assoc();
        $hashSenhaArmazenada = $row['senha'];

        // Verificar se a senha fornecida pelo usuário corresponde ao hash da senha armazenada
        if (password_verify($senha, $hashSenhaArmazenada)) {
            // Se as credenciais estiverem corretas, recuperar os dados do usuário e iniciar a sessão
            $_SESSION['nome_completo'] = $row['nome_completo'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['logradouro'] = $row['logradouro'];
            $_SESSION['numero'] = $row['numero'];
            $_SESSION['celular'] = $row['celular'];

            // Redirecionar para a página principal ou fazer outra ação após o login
            header('Location: ../index.php');
            exit();
        } else {
            // Senha incorreta
            echo "Credenciais inválidas. Por favor, tente novamente.";
        }
    } else {
        // Usuário com o e-mail fornecido não encontrado
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }

    // Fechar a declaração preparada
    $stmt->close();

    // Fechar a conexão com o banco de dados (opcional)
    $conn->close();
