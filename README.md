
Laravel 10, Mysql, Php 8

## Install with Composer

```
    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install or composer install
```

## Set Environment

```
    $ cp .env.example .env
```

## Run migrations

```
   $ php artisan migrate
```

## Run seeds

```
   $ php artisan db:seed
```

## Create admin user (if necessary)

```
   $ php artisan admin:user
``` 

## Set the application key

```
   $ php artisan key:generate
```

## Generate jwt secret key

```
    $ php artisan jwt:secret
```

- [Api Doc](http://127.0.0.1:8000/api/documentation).

- [use Swagger](https://github.com/DarkaOnLine/L5-Swagger)
- [use Admin](https://moonshine.cutcode.dev).

