## Apokrat

Apokrat is a medical platform that provides remote medical consultations and home healthcare. Through Apokrat you can consult with a select group of doctors and consultants via video call in more than 25 medical departments, ensuring your health and the health of your loved ones.

Using within the project multiple packages such as:

- [Filamentphp/filament](https://github.com/filamentphp/filament) for Admin dashboard.
- [Astrotomic/Laravel-translatable](https://github.com/Astrotomic/laravel-translatable) for database multi language.

## Setup The Project
```php
$cp .env.example .env
```
```php
$composer install
```
```php
$php artisan key:generate
```
> After this you must wire the database name in .env file and write in terminal this:
```php
$php artisan migrate
```
```php
$php artisan db:seed
```