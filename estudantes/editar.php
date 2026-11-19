<?php
require_once '../conexao.php';

use MongoDB\BSON\ObjectId;

$colecao = $banco->estudantes;

if (!isset($_GET['id']) || empty($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = $_GET['id'];

try {
    $objectId = new ObjectId($id);
} catch (Exception $e) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $dadosAtualizados = [
        'nome'            => $_POST['nome'] ?? '',
        'cpf'             => $_POST['cpf'] ?? '',
        'email'           => $_POST['e-mail'] ?? '',
        'telefone'        => $_POST['telefone'] ?? '',
        'data_nascimento' => $_POST['nomedtnascimento'] ?? '',
        'ra'              => $_POST['ra'] ?? '',
        'endereco'        => [
            'cep'         => $_POST['cep'] ?? '',
            'logradouro'  => $_POST['logradouro'] ?? '',
            'numero'      => $_POST['numero'] ?? '',
            'complemento' => $_POST['complemento'] ?? '',
            'bairro'      => $_POST['bairro'] ?? '',
            'cidade'      => $_POST['cidade'] ?? '',
            'estado'      => strtoupper($_POST['estado'] ?? '')
        ]
    ];

    try {
        $colecao->updateOne(
            ['_id' => $objectId],
            ['$set' => $dadosAtualizados]
        );

        echo "<script>
                alert('Estudante atualizado com sucesso!');
                window.location.href = 'index.php';
              </script>";
        exit;
    } catch (Exception $e) {
        die("Erro ao atualizar estudante: " . $e->getMessage());
    }
}

$estudante = $colecao->findOne(['_id' => $objectId]);

if (!$estudante) {
    header("Location: index.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Estudante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5 mb-5">
        <div class="card shadow-sm">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Editar Estudante</h4>
            </div>
            <div class="card-body">
                <form action="" method="POST">
                    <h5 class="mb-3 text-secondary">Dados Pessoais</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome Completo</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="<?= htmlspecialchars($estudante['nome'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cpf" class="form-label">CPF</label>
                            <input type="text" class="form-control" id="cpf" name="cpf" value="<?= htmlspecialchars($estudante['cpf'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="ra" class="form-label">RA / Matrícula</label>
                            <input type="text" class="form-control" id="ra" name="ra" value="<?= htmlspecialchars($estudante['ra'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-5">
                            <label for="e-mail" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="e-mail" name="e-mail" value="<?= htmlspecialchars($estudante['email'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="<?= htmlspecialchars($estudante['telefone'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="nomedtnascimento" class="form-label">Data de Nascimento</label>
                            <input type="date" class="form-control" id="nomedtnascimento" name="nomedtnascimento" value="<?= htmlspecialchars($estudante['data_nascimento'] ?? '') ?>" required>
                        </div>
                    </div>

                    <h5 class="mb-3 text-secondary">Endereço</h5>
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="<?= htmlspecialchars($estudante['endereco']['cep'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-7">
                            <label for="logradouro" class="form-label">Logradouro (Rua/Av.)</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro" value="<?= htmlspecialchars($estudante['endereco']['logradouro'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero" value="<?= htmlspecialchars($estudante['endereco']['numero'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="<?= htmlspecialchars($estudante['endereco']['complemento'] ?? '') ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="<?= htmlspecialchars($estudante['endereco']['bairro'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-3">
                            <label for="cidade" class="form-label">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" value="<?= htmlspecialchars($estudante['endereco']['cidade'] ?? '') ?>" required>
                        </div>
                        <div class="col-md-1">
                            <label for="estado" class="form-label">UF</label>
                            <input type="text" class="form-control" id="estado" name="estado" maxlength="2" value="<?= htmlspecialchars($estudante['endereco']['estado'] ?? '') ?>" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <a href="index.php" class="btn btn-secondary">Voltar</a>
                        <button type="submit" class="btn btn-success">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>