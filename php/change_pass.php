<?php
    require('connection-sql.php');
    $email = filter_input(INPUT_POST, 'email');
    $senha1 = filter_input(INPUT_POST, 'senha1');
    $senha2 = filter_input(INPUT_POST, 'senha2');

    $sqlUpdate = "UPDATE usuario SET senha = ? WHERE email = ?";

    if ($senha1 == $senha2) {
        $sql = "SELECT email FROM usuario WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result && $result->num_rows == 1) {
            // Se o usuário com o e-mail fornecido foi encontrado
            $row = $result->fetch_assoc();
            $hashSenhaArmazenada = password_hash($senha1, PASSWORD_DEFAULT);
            if (password_verify($senha1, $hashSenhaArmazenada)) {
                $stmt = $conn->prepare($sqlUpdate);
                $stmt->bind_param("ss", $hashSenhaArmazenada, $email);
                $stmt->execute();
                $result = $stmt->get_result();
                $conn->close();
                $stmt->close();
                echo"Sua senha foi atualizada";
                echo "<br><a href='../pages/login.html'>Pagina de Login</a>";
            }
        }
        else {
            echo "Esse email nao esta cadastrado";
            echo "<br>Volte para corrigir";
        }
    }
    else {
        echo "Algo deu errado";
        echo "<br>Volte para corrigir";
    }