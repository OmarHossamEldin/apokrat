FROM php:8.4-cli

ARG APP_NAME
ARG APP_DEBUG
ARG APP_ENV
ARG APP_KEY
ARG APP_URL
ARG APP_TIMEZONE
ARG BCRYPT_ROUNDS
ARG APP_FAKER_LOCALE
ARG APP_FALLBACK_LOCALE
ARG APP_LOCALE
ARG APP_MAINTENANCE_DRIVER
ARG BROADCAST_CONNECTION
ARG CACHE_PREFIX
ARG CACHE_STORE
ARG DB_CONNECTION
ARG DB_DATABASE
ARG DB_HOST
ARG DB_PASSWORD
ARG DB_PORT
ARG DB_USERNAME
ARG FILESYSTEM_DISK
ARG LOG_CHANNEL
ARG LOG_DEPRECATIONS_CHANNEL
ARG LOG_LEVEL
ARG LOG_STACK
ARG MAIL_ENCRYPTION
ARG MAIL_FROM_ADDRESS
ARG MAIL_FROM_NAME
ARG MAIL_HOST
ARG MAIL_MAILER
ARG MAIL_PASSWORD
ARG MAIL_PORT
ARG MAIL_USERNAME
ARG MEMCACHED_HOST
ARG QUEUE_CONNECTION
ARG REDIS_CLIENT
ARG REDIS_HOST
ARG REDIS_PASSWORD
ARG REDIS_PORT
ARG SESSION_DOMAIN
ARG SESSION_DRIVER
ARG SESSION_ENCRYPT
ARG SESSION_LIFETIME
ARG SESSION_PATH
ARG VITE_APP_NAME
ARG HTTP_PORT
ARG REVERB_PORT

ENV APP_NAME=${APP_NAME} \
    APP_DEBUG=${APP_DEBUG} \
    APP_ENV=${APP_ENV} \
    APP_KEY=${APP_KEY} \
    APP_URL=${APP_URL} \
    APP_TIMEZONE=${APP_TIMEZONE} \
    BCRYPT_ROUNDS=${BCRYPT_ROUNDS} \
    APP_FAKER_LOCALE=${APP_FAKER_LOCALE} \
    APP_FALLBACK_LOCALE=${APP_FALLBACK_LOCALE} \
    APP_LOCALE=${APP_LOCALE} \
    APP_MAINTENANCE_DRIVER=${APP_MAINTENANCE_DRIVER} \
    BROADCAST_CONNECTION=${BROADCAST_CONNECTION} \
    CACHE_PREFIX=${CACHE_PREFIX} \
    CACHE_STORE=${CACHE_STORE} \
    DB_CONNECTION=${DB_CONNECTION} \
    DB_DATABASE=${DB_DATABASE} \
    DB_HOST=${DB_HOST} \
    DB_PASSWORD=${DB_PASSWORD} \
    DB_PORT=${DB_PORT} \
    DB_USERNAME=${DB_USERNAME} \
    FILESYSTEM_DISK=${FILESYSTEM_DISK} \
    LOG_CHANNEL=${LOG_CHANNEL} \
    LOG_DEPRECATIONS_CHANNEL=${LOG_DEPRECATIONS_CHANNEL} \
    LOG_LEVEL=${LOG_LEVEL} \
    LOG_STACK=${LOG_STACK} \
    MAIL_ENCRYPTION=${MAIL_ENCRYPTION} \
    MAIL_FROM_ADDRESS=${MAIL_FROM_ADDRESS} \
    MAIL_FROM_NAME=${MAIL_FROM_NAME} \
    MAIL_HOST=${MAIL_HOST} \
    MAIL_MAILER=${MAIL_MAILER} \
    MAIL_PASSWORD=${MAIL_PASSWORD} \
    MAIL_PORT=${MAIL_PORT} \
    MAIL_USERNAME=${MAIL_USERNAME} \
    MEMCACHED_HOST=${MEMCACHED_HOST} \
    QUEUE_CONNECTION=${QUEUE_CONNECTION} \
    REDIS_CLIENT=${REDIS_CLIENT} \
    REDIS_HOST=${REDIS_HOST} \
    REDIS_PASSWORD=${REDIS_PASSWORD} \
    REDIS_PORT=${REDIS_PORT} \
    SESSION_DOMAIN=${SESSION_DOMAIN} \
    SESSION_DRIVER=${SESSION_DRIVER} \
    SESSION_ENCRYPT=${SESSION_ENCRYPT} \
    SESSION_LIFETIME=${SESSION_LIFETIME} \
    SESSION_PATH=${SESSION_PATH} \
    VITE_APP_NAME=${VITE_APP_NAME} \
    HTTP_PORT=${HTTP_PORT} \
    REVERB_PORT=${REVERB_PORT}

RUN apt-get update && apt-get install -y \
    gettext-base \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libpq-dev \
    libssl-dev \
    libmagickwand-dev \
    libjpeg62-turbo-dev \
    git \
    unzip \
    vim \
    wget \
    curl \
    zlib1g-dev \
    nodejs \
    npm \
    procps \
    supervisor \
    && rm -rf /var/lib/apt/lists/*

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN install-php-extensions \
    gd \
    zip \
    pdo \
    pdo_pgsql \
    exif \
    pgsql \
    redis-6.1.0 \
    openswoole \
    pcntl \
    xdebug \
    imagick \
    calendar \
    intl \
    uv \
    @composer

COPY ./docker/php/php.ini /usr/local/etc/php/conf.d/

WORKDIR /var/www

COPY package.json package-lock.json ./

RUN npm install

COPY composer.json composer.lock ./

COPY . .

RUN envsubst < /var/www/.env.example > /var/www/.env

RUN composer install --no-scripts

EXPOSE ${HTTP_PORT} ${REVERB_PORT}

COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
