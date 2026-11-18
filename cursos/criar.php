<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $banco->cursos->insertOne([
        'nome'          => trim($_POST['nome']),
        'codigo'        => trim($_POST['codigo']),
        'carga_horaria' => (int) $_POST['carga_horaria'],
        'turno'         => trim($_POST['turno']),
        'coordenador'   => trim($_POST['coordenador']),
        'criado_em'     => date('Y-m-d H:i:s')
    ]);

    header('Location: index.php?msg=Curso cadastrado com sucesso!');
    exit;
}