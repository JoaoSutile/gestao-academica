<?php
require_once '../conexao.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $banco->cursos->deleteOne(['_id' => $id]);
    $banco->matriculas->deleteMany(['curso_id' => $id]);
}

header('Location: index-cursos.php?msg=Curso removido com sucesso!');
exit;