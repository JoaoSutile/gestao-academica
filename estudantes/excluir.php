<?php
require_once '../conexao.php';

use MongoDB\BSON\ObjectId;

if (isset($_GET['id']) && !empty($_GET['id'])) {
    try {
        $objectId = new ObjectId($_GET['id']);
        $banco->estudantes->deleteOne(['_id' => $objectId]);
    } catch (Exception $e) {

    }
}

header("Location: index.php");
exit;