# App de gerenciamento para viagens

Desafio tecnico proposto para vaga de estagio na empresa Coinpel.

O projeto consiste em um app de gerenciamento de viagens, com funcionalidades como, adicionar usuarios(Administradores/Padrões), adicionar motoristas e veiculos, e adicionar viagens.

## Tecnologias usadas

O projeto foi desenvolvido utilizando as seguintes tecnologias:

* Backend
	 - Laravel 12 - Framework php para desenvolvimento web
	 - Composer - Gerenciador de dependêcias do php
	 - PostgreSQL - Gerenciador de banco de dados relacional
	 
* Frontend
	- Blade - Template engine nativa do Laravel
	- Vite - Bundler para assets (JS/CSS)
	- Bootstrap - Framework CSS utilitário

## Pré requisitos

Para conseguir rodar a aplicação na sua maquina você vai precisar instalar as seguintes tecnologias:


- Laravel : https://laravel.com/docs/12.x
- PostgreSQL : https://www.postgresql.org/download/
- Git : https://git-scm.com/downloads

## Configuração do projeto

Primeiramente você deve copiar o link que se encontra no botão codigo na parte superior do repositorio remoto.

Logo após no seu terminal coloque os seguinte comandos:

Clone o repositorio

```

$ git clone {url_do_projeto}
$ cd {nome_do_diretorio}


```
Instale as dependências:

```

$ composer install
$ npm install ou npm i

```
Gere os assets do front-end:

```
$ npm run build

```
## Configuração do ambiente

Copie o arquivo da .env.example para .env

Dentro da .env identifique: 

APP_NAME=CoinpelTour
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=http://localhost:8000/

DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=coinpel_tour
DB_USERNAME=root
DB_PASSWORD=

## Banco de dados

Crie o banco de dados no PostgresSQL:

```
CREATE DATABASE coinpel_tour;

```

Execute os comandos:

```

$ php artisan key:generate
$ php artisan migrate

```

Popular o banco de dados:

```
$ php artisan db:seed

```

Rode o projeto:
```
$ composer run dev

```

## Funcionalidades principais

* Usuarios
	- Login e Autenticação
	* Admin
		- Cadastro de Administradores e usuarios padrão
		
* Motoristas
	- Admin
		- Cadastro e gerenciamento
	- Listagem de Motoristas
	
* Veiculos
	- Admin
		- Cadastro e gerenciamento
	- Listagem de veiculos
	
* Viagens
	- Admin
		- Criação de viagens
		- Associação de motorista e veículo
	- Listagem de viagens

* Pacotes
	- Inscrição do usuario em uma viagem
	- Lista pacotes de viagem

* Contratos
	- Lista pacotes que usuario se inscreveu
	- Desinscrever de uma viagem