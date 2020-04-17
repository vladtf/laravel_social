# Laravel Social App

It's a web social app based on Laravel - php framerwok.

## Start the app

$ cd database/ and $touch database.sqlite  ( to create database : configure in .env another database connection )
$ cd .. ( back to app folder )
$ cp .env.example .env ( copy .env file )
$ npm install
$ composer install
$ npm run dev ( compile assets )
$ php artian migrate
$ php artisan key:generate
$ php artisan serve ( start local server : http://127.0.0.1:8000/ )

## Gitub Ouath

To run gituhb authentication you should start your own github oatuh application and insert keys into .env file
