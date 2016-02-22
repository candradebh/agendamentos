# Sistema de Agendamentos


Sistema de Agendamentos de consultas médicas utilizando PHP 7, Laravel Framework 5.2, FullCalendar 2.6, Bootstrap 3.6, Jquery.

## Instalação e Configuração

Existem duas maneiras de instalar a aplicaçao.

### Opção 1
Configurar o arquivo .env com o nome da da base dados, usuário e senha. Depois rodar o comando do artisan para geração das tabelas e seeders .

> php artisan migrate --seed

Depois é so executar o comando para executar a aplicação e acessa-la em http://localhost:8000

> php artisan serve

### Opção 2

Configurar o arquivo .env com o nome da da base dados, usuário e senha. Rodar o comando serve no artisan  e acessar em http://localhost:8000

>php artisan serve

## Outras opções para rodar a aplicação

-> criar um arquivo .htaccess redirecionando a aplicação para pasta ./public

-> criar um alias virtual host no apache

-> Apontamento de DNS para pasta public
