# Laravel 5.8+ preset

A preset to quick development start based on [Erik V. Fernandes](http://erikprogramador.github.io) experience by developing [Sales City](http://salescity.com.br).

Using the frontend preset functionality, we include some features that makes the Project start really fast.

This preset contains:

- Simple frontend stack with, [Vue](https://vuejs.org/), [Axios](https://github.com/axios/axios), [Laravel mix](https://laravel-mix.com/docs/4.0/basic-example), [tailwindcss](https://tailwindcss.com/docs/what-is-tailwind/)
- Frontend auth with tailwindcss style
- Flash messages
- PHP test helpers

## Instalation

- Start a [laravel project](https://laravel.com/docs/5.8#installation)
- Inside the project folder run `composer require erikprogramador/sales-city-preset`
- Then run `php artisan preset sales-city`
- Install the frontend dependencies `npm install`
- Run `npm run dev`

## Flash notification

Update your composer file adding those lines on the **autoload** section on your composer.json file
`"files": [ "config/functions.php" ]`

Then run `composer dump -o`

## PHP Testing

Update your composer file adding those lines on the **autoload-dev** section on your composer.json file
`"files": [ "tests/functions.php" ]`

Then run `composer dump -o`
