<?php
require_once '../conexao.php';

if (isset($_GET['id'])) {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
    $banco->matriculas->deleteOne(['_id' => $id]);
}

header('Location: index.php?msg=Matrícula cancelada com sucesso!');
exit;