FROM php:7-fpm-alpine

WORKDIR /usr/share/nginx/html/

COPY . /usr/share/nginx/html/

RUN chgrp -R www-data ./storage ./bootstrap/cache 

RUN chmod -R 775 ./storage ./bootstrap/cache 

RUN apk update && apk add \
    gcc g++ autoconf make vim \
    php7-pdo_pgsql openssl-dev libssl1.1 \
    nodejs npm

RUN pecl install mongodb

RUN yes '' | pecl install redis

COPY ./php.ini /usr/local/etc/php