<?php
require_once '../conexao.php';

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header('Location: index-matriculas.php');
    exit;
}

try {
    $id = new MongoDB\BSON\ObjectId($_GET['id']);
} catch (Exception $e) {
    header('Location: index-matriculas.php?erro=ID de matrícula inválido.');
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $estudanteId = new MongoDB\BSON\ObjectId($_POST['estudante_id']);
    $cursoId     = new MongoDB\BSON\ObjectId($_POST['curso_id']);
    $semestre    = trim($_POST['semestre']);

    $jaExiste = $banco->matriculas->findOne([
        'estudante_id' => $estudanteId,
        'curso_id'     => $cursoId,
        '_id'          => ['$ne' => $id]
    ]);

    if ($jaExiste) {
        header('Location: editar-matriculas.php?id=' . $_GET['id'] . '&erro=Este estudante já está matriculado neste curso.');
        exit;
    }

    $banco->matriculas->updateOne(
        ['_id' => $id],
        ['$set' => [
            'estudante_id' => $estudanteId,
            'curso_id'     => $cursoId,
            'semestre'     => $semestre
        ]]
    );

    header('Location: index-matriculas.php?msg=Matrícula atualizada com sucesso!');
    exit;
}

$matricula = $banco->matriculas->findOne(['_id' => $id]);

if (!$matricula) {
    header('Location: index-matriculas.php?erro=Matrícula não encontrada.');
    exit;
}

$estudantes = $banco->estudantes->find([], ['sort' => ['nome' => 1]]);
$cursos     = $banco->cursos->find([], ['sort' => ['nome' => 1]]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success mb-0">Editar Matrícula</h2>
        <a href="index-matriculas.php" class="btn btn-outline-secondary">Voltar</a>
    </div>

    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-warning"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Alterar Dados da Matrícula</h5>
        </div>
        <div class="card-body">
            <form action="" method="POST" class="row g-3">
                <div class="col-md-5">
                    <label for="estudante_id" class="form-label">Estudante</label>
                    <select id="estudante_id" name="estudante_id" class="form-select" required>
                        <option value="">Selecione um estudante...</option>
                        <?php foreach ($estudantes as $est): ?>
                            <?php $selecionado = ((string)$est['_id'] === (string)$matricula['estudante_id']) ? 'selected' : ''; ?>
                            <option value="<?= $est['_id'] ?>" <?= $selecionado ?>>
                                <?= htmlspecialchars($est['nome'] ?? 'Sem nome') ?>
                                <?= !empty($est['cpf']) ? ' (' . htmlspecialchars($est['cpf']) . ')' : '' ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-5">
                    <label for="curso_id" class="form-label">Curso</label>
                    <select id="curso_id" name="curso_id" class="form-select" required>
                        <option value="">Selecione um curso...</option>
                        <?php foreach ($cursos as $cur): ?>
                            <?php $selecionado = ((string)$cur['_id'] === (string)$matricula['curso_id']) ? 'selected' : ''; ?>
                            <option value="<?= $cur['_id'] ?>" <?= $selecionado ?>>
                                <?= htmlspecialchars(($cur['codigo'] ?? '') . ' - ' . ($cur['nome'] ?? '')) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="semestre" class="form-label">Semestre</label>
                    <input type="text" id="semestre" name="semestre" class="form-control" value="<?= htmlspecialchars($matricula['semestre'] ?? '') ?>" required>
                </div>

                <div class="col-12 d-flex justify-content-end gap-2">
                    <a href="index-matriculas.php" class="btn btn-secondary">Cancelar</a>
                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                </div>
            </form>
        </div>
    </div>
</div>

</body>
</html>