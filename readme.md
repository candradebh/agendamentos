# Sistema de Agendamentos


Sistema de Agendamentos de consultas médicas utilizando PHP 7, Laravel Framework 5.2, FullCalendar 2.6, Bootstrap 3.6, Jquery.

## Instalação e Configuração

Existem duas maneiras de instalar a aplicação. Todas as duas é necessário criar uma base de dados no mysql.

### Opção 1
Configurar o arquivo .env que se encontra na raiz, com o nome da da base dados, usuário e senha. Depois rodar o comando do artisan através do prompt de comando para geração das tabelas e seeders. O arquivo artisan esta localizado na raiz da aplicação.

> php artisan migrate --seed

Depois é so executar o comando para executar a aplicação e acessa-la em http://localhost:8000 através do browser.

> php artisan serve

### Opção 2

Importe o arquivo dados.sql que esta na raiz.

Configurar o arquivo .env que se encontra na raiz, com o nome da da base dados, usuário e senha. Rodar o comando serve no artisan na raiz da aplicação e acessar em http://localhost:8000 através do browser.

>php artisan serve

## Outras opções para rodar a aplicação

-> acesar a pasta public diretamente pelo browser http://localhost/agendamentos/public

-> criar um arquivo .htaccess redirecionando a aplicação para pasta ./public

-> criar um alias virtual host no apache

-> Apontamento de DNS para pasta public
