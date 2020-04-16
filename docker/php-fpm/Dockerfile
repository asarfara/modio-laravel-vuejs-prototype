FROM composer:latest AS composer

FROM php:7.3-fpm

WORKDIR /var/www/html

RUN curl -sL https://deb.nodesource.com/setup_11.x | bash -

RUN apt-get update \
    && apt-get install -y \
        nodejs \
        git \
        zip \
        apt-utils \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libxml2-dev \
        libmcrypt-dev \
        libpq-dev \
        libmemcached-dev \
    && docker-php-ext-install -j$(nproc) \
        soap \
        bcmath \
        sockets \
        intl \
        pdo \
        pdo_mysql \
    && pecl install memcached-3.1.3 \
    && docker-php-ext-enable memcached

COPY modio.ini $PHP_INI_DIR/conf.d/

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN usermod -u 1000 www-data
