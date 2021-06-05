<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Projeto de Sistema de genrenciamento de notas fiscais, feito em laravel

Sistema onde você como convidado, pode:
- Registrar um cadastro com uma imagem da nota fiscal

Já como admnistrado:
- Aprovar ou Reprovar tais notas
- Controlar outros usuarios no sistema (**CRUD**)


## Para rodar este projeto

```bash
-Entre na pasta raiz do projeto
$ composer install
$ cp .env.example .env
$ php artisan migrate #antes de rodar este comando verifique sua configuracao com banco em .env
$ php artisan db:seed #para gerar os seeders, dados de teste
$ php artisan key:generate
$ php artisan serve
```
Acesssar pela url: http://localhost:8000/dashboard/login

### Primeiro Login:
- email: teste.admin@gmail.com
- password: sistema_fiscal_123

**obs: Caso queira mudar, mude os valores do UserSeeder**

## Pré-requisitos
- PHP >= 7.3.0
- Laravel >= 8.X
- Composer >= 1.10.1
