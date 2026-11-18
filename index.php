<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistema de Gestão Acadêmica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    
    <div class="container my-5 text-center">

          <h1 class="mb-4">Sistema de Gestão Acadêmica</h1>

        <div class="row g-4 justify-content-center">

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>

                           <h3 class="card-title text-primary">Estudantes</h3>
                        <p class="card-text text-secondary">Gerenciamento de alunos e endereços</p> 

                        </div>

                        <a href="estudantes/index.php" class="btn btn-primary w-100 mt-3">Acessar Estudantes</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>

                            <h3 class="card-title text-primary">Cursos</h3>
                        <p class="card-text text-secondary">Gerenciamento dos cursos oferecidos</p>

                        </div>

                        <a href="cursos/index.php" class="btn btn-primary w-100 mt-3">Acessar Cursos</a>

                    </div>

                </div>

            </div>

            <div class="col-md-4">

                <div class="card h-100 shadow-sm border-0">

                    <div class="card-body d-flex flex-column justify-content-between">

                        <div>

                            <h3 class="card-title text-success">Matrículas</h3>
                            <p class="card-text text-secondary">Associação de alunos aos cursos</p>

                        </div>

                        <a href="matriculas/index.php" class="btn btn-success w-100 mt-3">Acessar Matrículas</a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>
</html>