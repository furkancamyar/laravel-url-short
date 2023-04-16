## Installation

1. Clone this repository with `git clone https://github.com/furkancamyar/laravel-url-short.git`

> While doing these steps, make sure to run the commands in the `~\laravel-url-short` directory.

2. Run `composer install` to install the PHP dependencies
3. Run `composer require ashallendesign/short-url`
4. Run `php artisan vendor:publish --provider="AshAllenDesign\ShortURL\Providers\ShortURLProvider"`
5. Run `npm install`
6. Set up a local database called `laravel-url-short`
7. Run `cp .env.example .env`

> Update .env to your specific needs. Don't forget to set `DB_DATABASE` and `APP_URL` with the settings used behind.
  `APP_URL = http://laravel-url-short.<..>` and `DB_DATABASE = laravel-url-short`

8. Run `php artisan migrate`
9. Run `npm run dev`

> Copy `APP_URL: http://laravel-url-short.<..>`
