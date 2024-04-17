<?php
$host = "localhost";
$db = "db_sitio3irmaos";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Função para executar consultas SQL preparadas
function executePreparedQuery($conn, $sql, $types = null, ...$params) {
    $stmt = $conn->prepare($sql);
    
    // Verificar se a preparação da consulta falhou
    if (!$stmt) {
        die("Erro na preparação da consulta: " . $conn->error);
    }
    
    // Vincular parâmetros à declaração preparada
    if (!empty($params)) {
        $stmt->bind_param($types, ...$params);
    }
    
    // Executar a consulta
    $stmt->execute();
    
    // Retornar o resultado da consulta
    return $stmt->get_result();
}