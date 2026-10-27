# Desafio 3 - Perfil de Usuário com Banco de Dados

## Sobre o projeto

Este projeto foi desenvolvido como parte do Desafio 3, com o objetivo de criar um sistema de login utilizando PHP e MySQL.

O sistema permite que o usuário entre com seus dados cadastrados no banco de dados, escolha uma cor de fundo para seu perfil e encerre a sessão quando desejar.

## Funcionalidades

- Login com usuário e senha cadastrados no banco de dados.
- Verificação dos dados de acesso.
- Utilização de sessões PHP para controlar o acesso.
- Página de perfil acessível somente após o login.
- Personalização da cor de fundo do perfil.
- Opção de logout para encerrar a sessão.
- Estilização das páginas com CSS.

## Tecnologias utilizadas

- PHP
- MySQL
- HTML5
- CSS3

## Banco de dados

**Banco:** `exercicio`

**Tabela:** `usuarios`

A tabela armazena os dados utilizados para realizar o login no sistema.

## Arquivos do projeto

- `15d_login.php` — página de login, validação dos dados e escolha da cor de fundo.
- `15d_perfil.php` — página de perfil com mensagem de boas-vindas e cor personalizada.
- `15d_logout.php` — encerra a sessão e redireciona para a página de login.

## Como executar o projeto

1. Inicie o servidor Apache e o MySQL pelo XAMPP, se estiver utilizando essa ferramenta.
2. Coloque a pasta `15d_desafio3` dentro do diretório `htdocs`.
3. Certifique-se de que o banco `exercicio` e a tabela `usuarios` estejam criados no MySQL.
4. Confira as configurações de conexão com o banco no arquivo `15d_login.php`.
5. Cadastre um usuário na tabela `usuarios`, caso ainda não exista.
6. Abra o navegador e acesse:

   `http://localhost/15d_desafio3/15d_login.php`

7. Entre com o usuário e a senha cadastrados, escolha uma cor de fundo e teste as funcionalidades do sistema.

## Objetivo do desafio

Praticar a integração entre PHP e MySQL, o uso de sessões para autenticação de usuários e a criação de páginas com HTML e CSS.

Desenvolvido para fins de aprendizado.
