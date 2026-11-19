<?php
require_once '../conexao.php';
$cursos = $banco->cursos->find([], ['sort' => ['nome' => 1]]);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciamento de Cursos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary mb-0">Gerenciamento de Cursos</h2>
        <a href="../index-gestao_academica.php" class="btn btn-outline-secondary">Voltar ao Início</a>
    </div>

    <?php if (isset($_GET['msg'])): ?>
        <div class="alert alert-success"><?= htmlspecialchars($_GET['msg']) ?></div>
    <?php endif; ?>

    <div class="card shadow-sm border-0 mb-4">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Cadastrar Novo Curso</h5>
        </div>
        <div class="card-body">
            <form action="criar-cursos.php" method="POST" class="row g-3">
                <div class="col-md-6">
                    <label for="nome" class="form-label">Nome do Curso</label>
                    <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Análise e Desenvolvimento de Sistemas" required>
                </div>

                <div class="col-md-3">
                    <label for="codigo" class="form-label">Código</label>
                    <input type="text" id="codigo" name="codigo" class="form-control" placeholder="Ex: ADS-01" required>
                </div>

                <div class="col-md-3">
                    <label for="carga_horaria" class="form-label">Carga Horária (h)</label>
                    <input type="number" id="carga_horaria" name="carga_horaria" class="form-control" min="1" placeholder="Ex: 2400" required>
                </div>

                <div class="col-md-3">
                    <label for="turno" class="form-label">Turno</label>
                    <select id="turno" name="turno" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="Matutino">Matutino</option>
                        <option value="Vespertino">Vespertino</option>
                        <option value="Noturno">Noturno</option>
                        <option value="Integral">Integral</option>
                    </select>
                </div>

                <div class="col-md-3">
                    <label for="modalidade" class="form-label">Modalidade</label>
                    <select id="modalidade" name="modalidade" class="form-select" required>
                        <option value="">Selecione...</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Semipresencial">Semipresencial</option>
                        <option value="EAD">EAD</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label for="coordenador" class="form-label">Coordenador(a)</label>
                    <input type="text" id="coordenador" name="coordenador" class="form-control" placeholder="Nome do coordenador responsável" required>
                </div>

                <div class="col-12 text-end">
                    <button type="submit" class="btn btn-primary">Salvar Curso</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white">
            <h5 class="mb-0">Cursos Cadastrados</h5>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0 align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Código</th>
                            <th>Nome</th>
                            <th>Carga Horária</th>
                            <th>Turno</th>
                            <th>Modalidade</th>
                            <th>Coordenador</th>
                            <th class="text-end">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cursos as $curso): ?>
                            <tr>
                                <td><strong><?= htmlspecialchars($curso['codigo'] ?? '') ?></strong></td>
                                <td><?= htmlspecialchars($curso['nome'] ?? '') ?></td>
                                <td><?= htmlspecialchars($curso['carga_horaria'] ?? '') ?>h</td>
                                <td><?= htmlspecialchars($curso['turno'] ?? '') ?></td>
                                <td><?= htmlspecialchars($curso['modalidade'] ?? '-') ?></td>
                                <td><?= htmlspecialchars($curso['coordenador'] ?? '') ?></td>
                                <td class="text-end">
                                    <a href="editar-cursos.php?id=<?= $curso['_id'] ?>" class="btn btn-sm btn-outline-primary">Editar</a>
                                    <a href="excluir-cursos.php?id=<?= $curso['_id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Deseja realmente excluir este curso?')">Excluir</a>
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