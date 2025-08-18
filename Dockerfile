FROM php:8.2-apache

RUN apt-get update
RUN apt-get install -y pngquant zip unzip wget
RUN wget https://getcomposer.org/composer.phar -O /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer

COPY composer.json composer.lock ./
RUN composer install

# COPY . /var/www/html