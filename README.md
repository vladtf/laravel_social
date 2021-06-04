# Laravel Social App

It's a web social app based on Laravel - php framerwok.

## Start the app

`$ cd database/` and `$touch database.sqlite`  ( to create database : configure in `.env` another database connection )

`$ cd .. ( back to app folder )`

`$ cp .env.example .env` ( copy .env file )

`$ npm install`

`$ composer install`

`$ npm run dev` ( compile assets )

`$ php artisan migrate`

`$ php artisan key:generate`

`$ php artisan storage:link` ( for saving images )

`$ php artisan serve` ( start local server : http://127.0.0.1:8000/ )

## Github Oauth

To run github authentication you should start your own github oauth application ( [Developer settings](https://github.com/settings/apps) ) and insert keys into `.env` file.

## Sending mail

Go to https://mailtrap.io/ and register a new service and change default mail configuration on `.env` file.
