# CategoriesApp
O projeto CategoriesApp é uma aplicação web desenvolvida com o framework Laravel, que tem como objetivo gerenciar categorias e subcategorias. A aplicação permite o cadastro, edição e exclusão de categorias e subcategorias, além de ser possível listar e consultar todas as categorias e subcategorias cadastradas.

## Visão Geral

Este projeto tem como objetivo oferecer uma solução eficiente para a gestão de categorias e subcategorias, ideal para aplicações que necessitam de uma estrutura hierárquica organizada. A implementação é Dockerizada, facilitando a configuração e o desenvolvimento colaborativo.

## Funconalidades

- **Criação de Categorias:** Permite a criação de novas categorias com nomes únicos.
- **Listagem de Categorias:** Recupera todas as categorias cadastradas, incluindo suas subcategorias.
- **Visualização de Categoria:** Exibe detalhes de uma categoria específica, incluindo suas subcategorias.
- **Exclusão de Categoria:** Permite a exclusão de uma categoria pelo seu identificador.

## Tecnologias Utilizadas

- **Laravel 11:** Framework PHP para desenvolvimento web.
- **MySQL 8:** Sistema de gerenciamento de banco de dados relacional.
- **Laravel Sail:** Ambiente de desenvolvimento Dockerizado para aplicações Laravel.
- **Laravel Sanctum:** Pacote de autenticação para APIs SPA (Single Page Application).

## Requisitos

- **Docker e Docker Compose:** Para execução do ambiente de desenvolvimento.
- **PHP 8.2:** Versão mínima para o funcionamento da versão do Laravel.
- **Composer:** Gerenciador de dependências para PHP.

## Instalação

1. **Clonar o repositório e acessar o diretório do projeto**
   ```bash
   git clone https://github.com/brunavitoria/categories-app.git
    cd categories-app
    ```
2. **Configurar Variáveis de Ambiente**

    Copie o arquivo .env.example para .env e ajuste as variáveis conforme necessário:
    ```bash
    DB_CONNECTION=mysql
    DB_HOST=mysql
    DB_PORT=3306
    DB_DATABASE=categories_db
    DB_USERNAME=sail
    DB_PASSWORD=password
    ```

3. **Construir e Iniciar os Containers**
    ```bash
    ./vendor/bin/sail up -d --build
    ```

4. **Instalar as Dependências do Composer e Migrar o Banco de Dados**
    ```bash
    ./vendor/bin/sail composer install
    ./vendor/bin/sail artisan migrate
    ```

5. **Gerar a Chave da Aplicação**
    ```bash
    ./vendor/bin/sail artisan key:generate
    ```

## Uso da API

**Endpoints Disponíveis**

Todos os endpoints da API estão disponíveis no prefixo `/api`. A seguir, estão listados os endpoints disponíveis:

### Autenticação

Os endpoints de autenticação permitem o registro, login, logout e obtenção de informações do usuário autenticado.

- **Registrar Usuário**
    - `POST /api/register`

- **Login**
    - `POST /api/login`

- **Logout**
    - `POST /api/logout`

- **Usuário Autenticado**
    - `GET /api/user`

### Categorias

Os endpoints de categorias permitem a criação, listagem, visualização, atualização e exclusão de categorias. Requerem autenticação.

- **Criar Categoria**
    - `POST /api/categories`

- **Listar Categorias**
    - `GET /api/categories`

- **Visualizar Categoria**
    - `GET /api/categories/{category}`

- **Excluir Categoria**
    - `DELETE /api/categories/{category}`

- **Atualizar Categoria**
    - `PUT /api/categories/{category}`

### Subcategorias

Os endpoints de subcategorias permitem a criação, listagem, visualização, atualização e exclusão de subcategorias. Requerem autenticação.

- **Criar Subcategoria**
    - `POST /api/categories/{category}/subcategories`

- **Listar Subcategorias**
    - `GET /api/categories/{category}/subcategories`

- **Visualizar Subcategoria**
    - `GET /api/categories/{category}/subcategories/{subcategory}`

- **Atualizar Subcategoria**
    - `PUT /api/categories/{category}/subcategories/{subcategory}`

- **Excluir Subcategoria**
    - `DELETE /api/categories/{id}/subcategories/{subcategory}`

## Autenticação

A aplicação utiliza o Laravel Sanctum para autenticação de usuários. Para obter um token de autenticação, é necessário criar um usuário e realizar a autenticação.

### Registro de Usuário

Para registrar um novo usuário, envie uma requisição POST para o endpoint `/api/register` com os seguintes campos:

- `name`: Nome do usuário
- `email`: E-mail do usuário
- `password`: Senha do usuário

### Login

Para realizar o login, envie uma requisição POST para o endpoint `/api/login` com os seguintes campos:

- `email`: E-mail do usuário
- `password`: Senha do usuário

Após a autenticação, o token de autenticação será retornado no corpo da resposta. Ele devera ser adicionado ao cabeçalho `Authorization` nas requisições que requerem autenticação.

### Logout

Para realizar o logout, envie uma requisição POST para o endpoint `/api/logout` com o token de autenticação no cabeçalho `Authorization`.

### Usuário Autenticado

Para obter os dados do usuário autenticado, envie uma requisição GET para o endpoint `/api/user` com o token de autenticação no cabeçalho `Authorization`.

## Testes

Para executar os testes automatizados, utilize o comando abaixo:
```bash
./vendor/bin/sail artisan test
```

## Documentação

<!-- A documentação da API foi gerada utilizando o Postman e está disponível no link abaixo:
- [Documentação da API](https://documenter.getpostman.com/view/16907391/UUy3Aq6T) -->

## Autora

Projeto desenvolvido por Bruna Vitória - [LinkedIn](https://www.linkedin.com/in/brunavitoria/)
