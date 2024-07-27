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
    DB_HOST=db
    DB_PORT=3306
    DB_DATABASE=categories_db
    DB_USERNAME=root
    DB_PASSWORD=secret
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

## Testes

Para executar os testes automatizados, utilize o comando abaixo:
```bash
./vendor/bin/sail artisan test
```

## Documentação

## Autora

Projeto desenvolvido por Bruna Vitória - [LinkedIn](https://www.linkedin.com/in/brunavitoria/)
