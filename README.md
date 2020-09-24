# Teste prático - Desenvolvedor Trainee

![https://blog.pusher.com/wp-content/uploads/2018/05/why-vuejs-laravel-header.png](https://blog.pusher.com/wp-content/uploads/2018/05/why-vuejs-laravel-header.png)

## Introdução

Teste prático para seleção de novos desenvolvedores da AccessCrédito.

O teste consiste no desenvolvimento de um CRUD sobre usuários e pode ser consultado a descrição inicial em [CHALLENGE.md](./CHALLENGE.md)

## Faz uso de

- Versionamento de código (**Git**)
- Seguinte stack:
  - HTML, CSS, JS
    - Vue.js
  - PHP
    - Laravel
    - Composer
  - Banco de Dados (Mysql)

## Requisitos

- [x] Cadastrar um novo Usuário:
  - Nome
  - CPF
  - Data Nascimento
  - Email
  - Tefone
  - Endereço
  - Cidade
  - Estado
  - CEP
- [x] Listar os usuários cadastrados
  - Links com ações para: **visualizar**, **editar** e **deletar** um usuário
- [x] Editar os dados do usuário
- [x] Deletar usuários a partir da tela de listagem ou de edição
- [x] Desenvolver uma consulta consumindo um serviço, webservice/api os correios para preencher os dados do endereço com o CEP informado. Sugestões:
  - [http://postmon.com.br/](http://postmon.com.br/)
  - [https://viacep.com.br/](https://viacep.com.br/)

## Setup

1. Requisitos

Ter instalado no seu ambiente **Git**, **Composer**, **nodejs e npm**, **yarn**, **PHP**, **MySQL**

2. Faça clone do repositório

```bash
git clone https://github.com/bberel/accesscredito-trainee-developer-challenge.git
```

3. Instale as dependencias do projeto

Referentes ao Laravel:

```bash
composer install
```

Referentes ao Vue.js:

```bash
yarn install
```

> O gerenciador de pacotes de preferencia é o Yarn, porem pode ser executado somente com o npm

```bash
npm install
```

4. Configure uma base de dados

```sql
mysql -uroot -p
CREATE DATABASE accesscredito_trainee_developer_challenge CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
quit
```

5. Crie um `.env` e gere uma chave

```bash
php -r "copy('.env.example', '.env');"
```

```bash
php artisan key:generate
```

6. Informe sua conexão com o banco no `.env` nos seguintes campos como exemplo

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=accesscredito_trainee_developer_challenge
DB_USERNAME=root
DB_PASSWORD=
```

7. Crie o banco de dados

```bash
composer dump-autoload

php artisan migrate

php artisan db:seed
```

8. Gere os arquivos de front-end

```bash
npm run dev
```

9. Execute o servidor do Laravel

```bash
php artisan serve --host 0.0.0.0
```

Agora pode acessar a aplicação em uso pelo seu navegador em [localhost:8000](http://localhost:8000/)

## Considerações

Em primeiro lugar gostaria de agradecer a oportunidade ter participado desta avaliação. Como um amante de desafios, esse teste não deixou a desejar mesmo enfrentando dificuldades como estar sem um computador pessoal além do desafio principal que foi correr atrás para aprender uma ferramenta nova como o Vue.js. Por fim posso dizer que estou contente com o resultado e com a participação.
