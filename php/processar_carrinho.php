<?php
    require("connection-sql.php");
    session_start();


    // Verifica se os dados do carrinho foram recebidos via POST
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Recebe os dados do carrinho como JSON e decodifica-os
        $dados_carrinho = json_decode(file_get_contents("php://input"), true);

        // Prepara e executa a consulta SQL para inserir os dados do carrinho no banco de dados
        $stmt = $conn->prepare("INSERT INTO pedido (nome_produto, valorTotal, quantidade) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $nome, $preco, $quantidade);

        foreach ($dados_carrinho as $item) {
            $nome = $item['nome'];
            $preco = $item['preco'];
            $quantidade = $item['quantidade'];
            $stmt->execute();
        }

        // Fecha a conexão com o banco de dados
        $stmt->close();
        $conn->close();

        // Responde ao JavaScript com uma mensagem de sucesso
        echo "Dados do carrinho recebidos e processados com sucesso!";
    } else {
        // Se os dados do carrinho estiverem vazios, retorna uma mensagem de erro
        http_response_code(400); // Bad Request
        echo "Erro: Os dados do carrinho estão vazios ou em um formato inválido.";
    }
