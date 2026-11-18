<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estudanteId = new MongoDB\BSON\ObjectId($_POST['estudante_id']);
    $cursoId     = new MongoDB\BSON\ObjectId($_POST['curso_id']);
    $semestre    = trim($_POST['semestre']);

    $jaExiste = $banco->matriculas->findOne([
        'estudante_id' => $estudanteId,
        'curso_id'     => $cursoId
    ]);

    if ($jaExiste) {
        header('Location: index.php?erro=Este estudante já está matriculado neste curso.');
        exit;
    }

    $banco->matriculas->insertOne([
        'estudante_id'   => $estudanteId,
        'curso_id'       => $cursoId,
        'semestre'       => $semestre,
        'data_matricula' => date('d/m/Y')
    ]);

    header('Location: index.php?msg=Matrícula realizada com sucesso!');
    exit;
}