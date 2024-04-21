<?php
    require("connection-sql.php");
    session_start();

    if (!isset($_SESSION['email'])) {
        // Se o usuário não estiver logado, redirecionar para a página de login
        header('Location: welcome.html');
        exit();
    }
    // Verifica se os dados do carrinho foram recebidos via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do carrinho como JSON e decodifica-os
        $dados_carrinho = json_decode(file_get_contents("php://input"), true);

        // Prepara e executa a consulta SQL para inserir os dados do carrinho no banco de dados
        $stmt = $conn->prepare("INSERT INTO pedidoproduto (numPedido, nome_produto, valor, quantidade) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("isdi", $numPedido, $nome, $preco, $quantidade);

        // Gera um número de pedido aleatório
        $numPedido = rand(1, 99999);

        foreach ($dados_carrinho as $item) {
            // Atribui os valores às variáveis a partir do item
            $nome = $item['nome'];
            $preco = $item['preco'];
            $quantidade = $item['quantidade'];

            // Executa a consulta preparada para cada item
            $stmt->execute();
        }

        // Fecha a consulta preparada
        $stmt->close();

        // Fecha a conexão com o banco de dados
        $conn->close();

        // Responde ao JavaScript com uma mensagem de sucesso
        echo "Dados do carrinho recebidos e processados com sucesso!";
    } else {
        // Se os dados do carrinho estiverem vazios, retorna uma mensagem de erro
        http_response_code(400); // Bad Request
        echo "Erro: Os dados do carrinho estão vazios ou em um formato inválido.";
    }