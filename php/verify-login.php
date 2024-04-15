<?php
    require ('connection-sql.php');

    session_start();
    
    $email = filter_input(INPUT_POST, 'email');
    $senha = $_POST["senha"];

    $sql = "SELECT nome_completo, email, logradouro, numero, celular from usuario where email = '$email' and senha = '$senha'";
    $result = $conn->query($sql) or die("". $conn->error);

    if ($result && $result->num_rows == 1) {
        // Se as credenciais estiverem corretas, recuperar os dados do usuário e iniciar a sessão
        $row = $result->fetch_assoc();
        $_SESSION['nome_completo'] = $row['nome_completo'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['logradouro'] = $row['logradouro'];
        $_SESSION['numero'] = $row['numero'];
        $_SESSION['celular'] = $row['celular'];

        // Adicionar var_dump para depuração
        // var_dump($_SESSION);

        // Redirecionar para a página principal ou fazer outra ação após o login
        header('Location: ../index.php');
        exit();
    } else {
        // Se as credenciais estiverem incorretas, exibir uma mensagem de erro
        echo "Credenciais inválidas. Por favor, tente novamente.";
    }
