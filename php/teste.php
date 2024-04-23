<?php
session_start();
if (!isset($_SESSION['email'])) {
    // Se o usuário não estiver logado, redirecionar para a página de login
    header('Location: welcome.html');
    exit();
} else {
    // Se o usuário estiver logado, exibir os dados do usuário
    $usuario_id = $_SESSION['id'];
    $nome = $_SESSION['nome_completo'];
    $email = $_SESSION['email'];
    $logradouro = $_SESSION['logradouro'];
    $numero = $_SESSION['numero'];
    $celular = $_SESSION['celular'];
}

?>

<p><?php echo $usuario_id; ?></p>
<p><?php echo $nome; ?></p>