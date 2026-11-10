<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Estudantes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <div class="container my-5">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h2>Cadastrar Estudante</h2>
            <a href="../index.php" class="btn btn-outline-secondary">Voltar ao Menu</a>

        </div>

    </div>

    <form action="criar.php" method="POST" class="card card-body shadow-sm border-0">

        <h4 class="mb-3 text-primary">Dados Pessoais</h4>

        <div class="row g-3">

            <div class="col-md-6">

                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" id="nome" name="nome" class="form-control" placeholder="Ex: Maria Silva" required>
            
            </div>

            <div class="col-md-6">

                <label for="nome" class="form-label">E-mail</label>
                <input type="email" id="e-mail" name="e-mail" class="form-control" placeholder="Ex: mariasilva@gmail.com" required>
            
            </div>

            <div class="col-md-6">

                <label for="nome" class="form-label">CPF</label>
                <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Ex; 12345678901" required>
            
            </div>

            <div class="col-md-6">

                <label for="nome" class="form-label">Data de Nascimento</label>
                <input type="date" id="nomedtnascimento" name="nomedtnascimento" class="form-control" placeholder="Ex: 01/01/2000" required>
            
            </div>

            <div class="col-md-6">

                <label for="nome" class="form-label">Telefone</label>
                <input type="text" id="telefone" name="telefone" class="form-control" placeholder="Ex: (55) 12345-6789" required>
            
            </div>

        </div>

        <hr class="my-4">

        <div class="row g-3">

            <div class="col-md-5">
                
                <label for="logradouro" class="form-label">Logradouro (Rua/Avenida/Estrada)</label>
                <input type="text" id="logradouro" name="logradouro" class="form-control" placeholder="Rua das Flores" required>
            
            </div>
            
            <div class="col-md-2">

                <label for="numero" class="form-label">Número</label>
                <input type="text" id="numero" name="numero" class="form-control" placeholder="123" required>
            
            </div>

            <div class="col-md-5">

                <label for="complemento" class="form-label">Complemento</label>
                <input type="text" id="complemento" name="complemento" class="form-control" placeholder="Apto 42, Bloco B">
            
            </div>

            <div class="col-md-4">

                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" id="bairro" name="bairro" class="form-control" placeholder="Centro" required>
            
            </div>

            <div class="col-md-4">

                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" id="cidade" name="cidade" class="form-control" placeholder="São Paulo" required>
            
            </div>

            <div class="col-md-2">

                <label for="estado" class="form-label">Estado (UF)</label>
                <input type="text" id="estado" name="estado" class="form-control" maxlength="2" placeholder="SP" required>
            
            </div>

            <div class="col-md-2">

                <label for="cep" class="form-label">CEP</label>
                <input type="text" id="cep" name="cep" class="form-control" placeholder="00000-000" required>
            
            </div>

        </div>

        <div class="mt-4 d-flex gap-2">

            <button type="submit" class="btn btn-primary">Salvar Estudante</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
            
        </div>

    </form>
    
</body>
</html>