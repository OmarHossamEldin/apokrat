#!/bin/bash

envsubst < /var/www/.env.example > /var/www/.env

composer install --no-scripts

composer run-script post-autoload-dump

chmod -R 777 storage bootstrap/cache

php artisan migrate

#php artisan permission:sync

php artisan storage:link

php artisan optimize

mkdir -p /var/www/storage/logs/supervisor

cp ./docker/supervisord/conf.d/horizon-worker.conf /etc/supervisor/conf.d/horizon-worker.conf
cp ./docker/supervisord/conf.d/schedule-worker.conf /etc/supervisor/conf.d/schedule-worker.conf

cp ./docker/supervisord/supervisord.conf /etc/supervisor/supervisord.conf

supervisord -c /etc/supervisor/supervisord.conf &

php artisan octane:start --host=0.0.0.0 --port="${HTTP_PORT}"
