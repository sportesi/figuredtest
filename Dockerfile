FROM php:7-fpm-alpine

WORKDIR /var/www/html

COPY . /var/www/html

RUN chgrp -R www-data ./storage ./bootstrap/cache 

RUN chmod -R 664 ./storage ./bootstrap/cache 

RUN apk update && apk add \
    gcc g++ autoconf make vim \
    php7-pdo_pgsql

RUN pecl install mongodb

RUN yes '' | pecl install redis

COPY ./php.ini /usr/local/etc/php