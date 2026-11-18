<?php
require_once __DIR__ . '/vendor/autoload.php';

try {

    $uri = "mongodb+srv://joao200406_db_user:academico123@cluster0.lgcasmn.mongodb.net/";

    $cliente = new MongoDB\Client($uri);
    $banco = $cliente->gestao_academica;
} catch (Exception $e) {
    die("Erro ao conectar ao MongoDB Atlas: " . $e->getMessage());
}
