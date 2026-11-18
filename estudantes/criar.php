<?php
require_once '../conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $colecaoEstudantes = $banco->estudantes;

    $documento = [
        'nome'            => $_POST['nome'] ?? '',
        'email'           => $_POST['e-mail'] ?? '',
        'cpf'             => $_POST['cpf'] ?? '',
        'data_nascimento' => $_POST['nomedtnascimento'] ?? '',
        'telefone'        => $_POST['telefone'] ?? '',
        'endereco'        => [
            'logradouro'  => $_POST['logradouro'] ?? '',
            'numero'      => $_POST['numero'] ?? '',
            'complemento' => $_POST['complemento'] ?? '',
            'bairro'      => $_POST['bairro'] ?? '',
            'cidade'      => $_POST['cidade'] ?? '',
            'estado'      => strtoupper($_POST['estado'] ?? ''),
            'cep'         => $_POST['cep'] ?? ''
        ],
        'criado_em'       => new MongoDB\BSON\UTCDateTime()
    ];

    try {
        $resultado = $colecaoEstudantes->insertOne($documento);

        if ($resultado->getInsertedCount() === 1) {
            echo "<script>
                    alert('Estudante cadastrado com sucesso!');
                    window.location.href = 'index.php';
                  </script>";
            exit;
        }
    } catch (Exception $e) {
        die("Erro ao salvar estudante: " . $e->getMessage());
    }
}

header('Location: index.php');
exit;