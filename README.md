<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Instalação

- Após fazer o checkout do projeto, rodar o dump do banco de dados localizado na raiz do projeto de nome dump_teste.sql
- Criar link simbólico para o upload de arquivos: php artisan storage:link
- renomear o arquivo .env-example para .env (verificar de acordo com as configurações do seu banco)
- rodar o comando: composer install
- rodar o comando: npm install
- na raiz do projeto, executar o comando: php artisan serve
- também na raiz do projeto, executar o comando: npm run dev

## Frontend

- na raiz do projeto, rodar o comando: json-server --watch db.json
o desenvolvimento para o teste frontend está disponível pela url: http://localhost:8000/


## Backend

o desenvolvimento para o teste backend está disponível em: http://localhost:8000/login
- **login: admin@teste.com**
- **senha: 12345678**

o crud pode ser visualizado em: http://localhost:8000/produtos

