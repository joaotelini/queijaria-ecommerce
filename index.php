<?php
    session_start();

    // Verificar se o usuário está logado
    if (!isset($_SESSION['email'])) {
        // Se o usuário não estiver logado, redirecionar para a página de login
        header('Location: pages/login.html');
        exit();
    } else {
        // Se o usuário estiver logado, exibir os dados do usuário
        $nome = $_SESSION['nome_completo'];
        $email = $_SESSION['email'];
        $logradouro = $_SESSION['logradouro'];
        $numero = $_SESSION['numero'];
        $celular = $_SESSION['celular'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Página Inicial</title>
</head>
<body>
    <h1>Bem-vindo à Página Inicial</h1>
    <p>Nome: <?php echo $nome; ?></p>
    <p>Email: <?php echo $email; ?></p>
    <p>Logradouro: <?php echo $logradouro; ?></p>
    <p>Número: <?php echo $numero; ?></p>
    <p>Celular: <?php echo $celular; ?></p>
    <!-- Adicione aqui qualquer outra informação do usuário que deseja exibir -->
    <p><a href="php/logout.php">Sair</a></p>
</body>
</html>
<?php
    }
?>
