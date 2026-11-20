# Sistema de Gestão Acadêmica

João Pedro Rosa Bortoloso  RA:60005901
João Vitor Garcia Sutile   RA:60005662

## 1. Sobre o projeto

O Sistema de Gestão Acadêmica é um projeto desenvolvido em PHP utilizando o banco de dados MongoDB. O objetivo é permitir o gerenciamento de informações acadêmicas por meio de três módulos principais: estudantes, cursos e matrículas.

## 2. Tecnologias utilizadas

- PHP 8.1 ou superior
- MongoDB Atlas
- Biblioteca MongoDB para PHP
- Composer
- XAMPP
- Bootstrap 5.3

## 3. Funcionalidades

O sistema está dividido em três módulos:

- **Estudantes:** gerenciamento de alunos e seus endereços.
- **Cursos:** gerenciamento dos cursos oferecidos.
- **Matrículas:** associação de estudantes aos cursos.

## 4. Requisitos para instalação

Antes de executar o projeto, é necessário possuir:

- XAMPP instalado.
- PHP 8.1 ou superior.
- Extensão MongoDB para PHP habilitada.
- Composer instalado.
- Acesso à internet.
- Credenciais de acesso ao banco de dados MongoDB Atlas.

## 5. Instalação do projeto

### 5.1. Clonar o repositório

Abra o terminal na pasta `htdocs` do XAMPP e execute:

```bash
git clone https://github.com/JoaoSutile/gestao-academica.git
```

Entre na pasta do projeto:

```bash
cd gestao-academica
```

### 5.2. Instalar as dependências

Execute o comando:

```bash
composer install
```

Esse comando instalará as bibliotecas necessárias para o funcionamento do projeto.

### 5.3. Configurar a conexão com o MongoDB

Na raiz do projeto, existe o arquivo `conexao-exemplo.php`, que contém um modelo de conexão com o banco de dados.

Para configurar:

1. Faça uma cópia do arquivo `conexao-exemplo.php`.
2. Renomeie a cópia para `conexao.php`.
3. Abra o arquivo `conexao.php`.
4. Substitua `USUARIO_AQUI` pelo usuário do MongoDB Atlas.
5. Substitua `SENHA_AQUI` pela senha correspondente.
6. Salve o arquivo.

As credenciais de acesso ao banco de dados serão fornecidas separadamente pela equipe responsável pelo projeto.

**Importante:** o arquivo `conexao.php` não é enviado ao GitHub por conter informações de acesso ao banco de dados.

### 5.4. Acesso ao banco de dados

O projeto utiliza o MongoDB Atlas, portanto é necessário que o endereço IP utilizado para a conexão esteja autorizado na lista de acesso do banco de dados.

Para a avaliação do projeto, o acesso poderá ser realizado por meio da configuração de liberação de endereços IPv4 no MongoDB Atlas.

## 6. Executar o projeto

Após concluir as configurações:

1. Abra o XAMPP.
2. Inicie o serviço Apache.
3. Abra o navegador.
4. Acesse o endereço:

```text
http://localhost/gestao-academica/index-gestao_academica.php
```

A página inicial apresentará os três módulos disponíveis: Estudantes, Cursos e Matrículas.

## 7. Observações

- É necessário manter o computador conectado à internet para acessar o MongoDB Atlas.
- O arquivo `conexao.php` deve permanecer na raiz do projeto.
- Não compartilhe as credenciais de acesso publicamente.
- O arquivo `vendor/` é gerado pela instalação das dependências do Composer.

## 8. Repositório

GitHub: https://github.com/JoaoSutile/gestao-academica