<?php
require_once '../conexao.php';

$estudantes = $banco->estudantes->find([], ['sort' => ['nome' => 1]]);
$cursos     = $banco->cursos->find([], ['sort' => ['nome' => 1]]);
$matriculas = $banco->matriculas->find([], ['sort' => ['data_matricula' => -1]]);

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Matrículas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success mb-0">Matrículas</h2>
        <a href="../index-gestao_academica.php" class="btn btn-outline-secondary">Voltar ao Início</a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <?php if (isset($_GET['erro'])): ?>
        <div class="alert alert-warning"><?= htmlspecialchars($_GET['erro']) ?></div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-success text-white">
            <h5 class="mb-0">Realizar Nova Matrícula</h5>
        </div>
        <div class="card-body">
            <form action="criar-matriculas.php" method="POST" class="row g-3">
                <div class="col-md-5">
                    <label for="estudante_id" class="form-label">Estudante</label>
                    <select id="estudante_id" name="estudante_id" class="form-select" required>
                        <option value="">Selecione um estudante...</option>
                        <?php foreach ($estudantes as $est): ?>
                            <option value="<?= $est['_id'] ?>">
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
                            <option value="<?= $cur['_id'] ?>">
                                <?= htmlspecialchars(($cur['codigo'] ?? '') . ' - ' . ($cur['nome'] ?? '')) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="col-md-2">
                    <label for="semestre" class="form-label">Semestre</label>
                    <input type="text" id="semestre" name="semestre" class="form-control" value="2026.2" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-success">Confirmar Matrícula</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0">Matrículas Ativas</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Estudante</th>
                            <th>Curso</th>
                            <th>Semestre</th>
                            <th>Data da Matrícula</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($matriculas as $mat): ?>
                            <?php
                            $estudante = $banco->estudantes->findOne(['_id' => $mat['estudante_id']]);
                            $curso     = $banco->cursos->findOne(['_id' => $mat['curso_id']]);
                            ?>
                            <tr>
                                <td><?= htmlspecialchars($estudante['nome'] ?? 'Estudante removido') ?></td>
                                <td><?= htmlspecialchars(($curso['codigo'] ?? '') . ' - ' . ($curso['nome'] ?? 'Curso removido')) ?></td>
                                <td><span class="badge bg-secondary"><?= htmlspecialchars($mat['semestre'] ?? '') ?></span></td>
                                <td><?= htmlspecialchars($mat['data_matricula'] ?? '') ?></td>
                                <td class="text-end">
                                    <a href="editar-matriculas.php?id=<?= $mat['_id'] ?>" class="btn btn-sm btn-outline-warning">Editar</a>
                                    <a href="excluir-matriculas.php?id=<?= $mat['_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Cancelar esta matrícula?')">Cancelar</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

</body>
</html>