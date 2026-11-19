<?php
require_once '../conexao.php';

$id = $_GET['id'] ?? $_POST['id'] ?? null;
if (!$id) {
    header('Location: index-cursos.php');
    exit;
}

$objectId = new MongoDB\BSON\ObjectId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $banco->cursos->updateOne(
        ['_id' => $objectId],
        ['$set' => [
            'nome'          => trim($_POST['nome']),
            'codigo'        => trim($_POST['codigo']),
            'carga_horaria' => (int) $_POST['carga_horaria'],
            'turno'         => trim($_POST['turno']),
            'modalidade'    => trim($_POST['modalidade']),
            'coordenador'   => trim($_POST['coordenador'])
        ]]
    );

    header('Location: index-cursos.php?msg=Curso atualizado com sucesso!');
    exit;
}

$curso = $banco->cursos->findOne(['_id' => $objectId]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Curso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary mb-0">Editar Curso</h2>
        <a href="index-cursos.php" class="btn btn-outline-secondary">Cancelar</a>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="editar-cursos.php" method="POST" class="row g-3">
                <input type="hidden" name="id" value="<?= $curso['_id'] ?>">

                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input type="text" id="nome" name="nome" class="form-control" value="<?= htmlspecialchars($curso['nome'] ?? '') ?>" required>
                </div>

                <div class="col-md-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" value="<?= htmlspecialchars($curso['codigo'] ?? '') ?>" required>
                </div>

                <div class="col-md-3">
                    <label for="carga_horaria" class="form-label">Carga Horária (h)</label>
                    <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" value="<?= htmlspecialchars($curso['carga_horaria'] ?? '') ?>" required>
                </div>

                <div class="col-md-3">
                    <label for="turno" class="form-label">Turno</label>
                    <select id="turno" name="turno" class="form-select" required>
                        <?php foreach (['Matutino', 'Vespertino', 'Noturno', 'Integral'] as $t): ?>
                            <option value="<?= $t ?>" <?= ($curso['turno'] ?? '') === $t ? 'selected' : '' ?>><?= $t ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="modalidade" class="form-label">Modalidade</label>
                    <select id="modalidade" name="modalidade" class="form-select" required>
                        <?php foreach (['Presencial', 'Semipresencial', 'EAD'] as $m): ?>
                            <option value="<?= $m ?>" <?= ($curso['modalidade'] ?? '') === $m ? 'selected' : '' ?>><?= $m ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="coordenador" class="form-label">Coordenador(a)</label>
                    <input type="text" id="coordenador" name="coordenador" class="form-control" value="<?= htmlspecialchars($curso['coordenador'] ?? '') ?>" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Atualizar Curso</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>