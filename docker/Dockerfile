FROM php:8.4-cli

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

RUN composer install --no-scripts

COPY . .


EXPOSE ${HTTP_PORT} ${REVERB_PORT}

COPY ./docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh
ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
