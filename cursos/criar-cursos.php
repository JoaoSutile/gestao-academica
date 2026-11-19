<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $banco->cursos->insertOne([
        'nome'          => trim($_POST['nome']),
        'codigo'        => trim($_POST['codigo']),
        'carga_horaria' => (int) $_POST['carga_horaria'],
        'turno'         => trim($_POST['turno']),
        'modalidade'    => trim($_POST['modalidade']),
        'coordenador'   => trim($_POST['coordenador']),
        'criado_em'     => date('Y-m-d H:i:s')
    ]);

    header('Location: index-cursos.php?msg=Curso cadastrado com sucesso!');
    exit;
}