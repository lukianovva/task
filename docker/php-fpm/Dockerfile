FROM php:8.3.2-fpm-alpine

RUN apk add --no-cache curl git build-base zlib-dev oniguruma-dev autoconf bash

# PHP Extension
# Installing via script: https://github.com/mlocati/docker-php-extension-installer
RUN curl -sSLf \
        -o /usr/local/bin/install-php-extensions \
        https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions && \
    chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions gd xdebug zip pdo_pgsql pdo_mysql sockets

ARG PUID=1000
ARG PGID=1000

RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

COPY ./ /var/www
WORKDIR /var/www

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

CMD php-fpm

EXPOSE 9000
