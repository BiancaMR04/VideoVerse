# Sistema VideoVerse

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

Este projeto é um sistema de visualização de vídeos desenvolvido utilizando o framework Laravel chamado VideoVerse. Oferece aos usuários a capacidade de realizar funcionalidades como assistir vídeos, curtir, comentar, se inscrever em canais, postar vídeos, entre outros. Além disso, o sistema conta com interação de forma intuitiva e amigável.

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
</p>


## Requisitos para executar o projeto:

- [Laravel](https://laravel.com/docs/9.x) >= 9.0 
- [PHP](https://www.php.net/downloads.php) >= 8.1
- [Composer](https://getcomposer.org/)
- Banco de dados relacional

## Como executar:

Após realizar o clone do projeto execute os seguintes comandos no terminal:


```
composer install
```

```
composer dump-autoload
````

```
cp .env.example .env
php artisan key:generate
```

```
npm install
```

Para rodar a aplicação utilize o comando abaixo:

```
php artisan serve
```

### Configurar banco de dados no laravel:

Deve-se modificar no arquivo .env como nos trechos abaixo:

### Postgresql

```dotenv
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432 //porta padrão do postgresql
DB_DATABASE=videoverse //nome do banco criado
DB_USERNAME=meu_usuario
DB_PASSWORD=minha_senha
```
### Supabase

```dotenv
DB_CONNECTION=supabase
DB_HOST=link_da_host
DB_PORT=5432
DB_DATABASE=postgres
DB_USERNAME=meu_usuario
DB_PASSWORD=minha_senha
```
