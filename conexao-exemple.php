<?php
require_once __DIR__ . '/vendor/autoload.php';

try {
    $uri = "mongodb+srv://USUARIO:SENHA@SEU_CLUSTER.mongodb.net/?retryWrites=true&w=majority";
    $cliente = new MongoDB\Client($uri);
    $banco = $cliente->gestao_academica;
} catch (Exception $e) {
    die("Erro ao conectar ao MongoDB Atlas: " . $e->getMessage());
}