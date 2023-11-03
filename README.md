# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/lumen-framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/lumen)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

> **Note:** In the years since releasing Lumen, PHP has made a variety of wonderful performance improvements. For this reason, along with the availability of [Laravel Octane](https://laravel.com/docs/octane), we no longer recommend that you begin new projects with Lumen. Instead, we recommend always beginning new projects with [Laravel](https://laravel.com).

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Contributing

Thank you for considering contributing to Lumen! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

## License

The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Requirements

- PHP >= 8.1
- MySQL 8 (or MariaDB)


## Download and setup

If you are using SSH and private key technique you can download my project like this:
> git clone git@github.com:lucamezzolla/lumen10.git
> cd lumen10

Edit the .env file and set the database name, username and password. If you want to change the JWT secret code first like this:
> php artisan jwt:secret
> vim .env

Run the following command to create the database with the name indicated in the .env file and the "user" table. Set production mode and answer yes when asked to create the database.
> php artisan migrate

Let's create a user with the command:
> php artisan db:seed --class=UserSeeder

Open your database and browse the user table to see the newly created user (the plaintext password is 1234).

Please note: the newly created user has the role "user". You can now upgrade the role from user to "admin". Run a webserver with php like this:
> php -S localhost:8000 -t public

Open the Postman application and authorize the user created at the address: http://localhost:8000/api/login (POST) and in the body (formdata) write email: admin and password: 1234

The answer will be like this:
{
    "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjk5MDQ3NDU3LCJleHAiOjE2OTkwNTEwNTcsIm5iZiI6MTY5OTA0NzQ1NywianRpIjoiWlVSM2RBY2ZNeGJOdU1ZMiIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-lF1Lvn-SgbkGiUabolRH0Bu1b_BYeARhHa6hEI2NGo",
    "token_type": "bearer",
    "user": {
        "id": 1,
        "name": "name",
        "email": "name@email.com",
        "remember_token": null,
        "created_at": "2023-10-27T20:24:38.000000Z",
        "updated_at": "2023-10-27T20:24:38.000000Z",
        "role": "user"
    },
    "expires_in": 86400
}

Copy and paste the token and you can use it in the other requests you make by indicating it in the header:
Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vbG9jYWxob3N0OjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNjk5MDQ3NDU3LCJleHAiOjE2OTkwNTEwNTcsIm5i ZiI6MTY5OTA0NzQ1NywianRpIjoiWlVSM2RBY2ZNeGJOdU1ZMiIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.-lF1Lvn-Sg bkGiUabolRH0Bu1b_BYeARhHa6hEI2NGo

and be sure to also indicate:

ContentType: application/json

To change your user by setting the role from user to admin you can use the http://localhost:8000/api/admin/user/update/1 (PUT) service. Make sure to add the headers as described above. In the body (raw JSON) you can write:

{
     "role": "admin"
}

However you can find all the routes already set up in this project in the routes/web.php file.

Enjoy it!

Luca



