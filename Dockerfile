FROM php:8.2-apache

RUN apt-get update
RUN apt-get install -y pngquant zip unzip wget imagemagick cron

RUN wget https://getcomposer.org/composer.phar -O /usr/local/bin/composer
RUN chmod +x /usr/local/bin/composer
COPY composer.json composer.lock ./
RUN composer install

COPY ./apache.conf /etc/apache2/sites-available/000-default.conf
COPY . /var/www/html
RUN mkdir -p /var/www/html/uploads && chown -R www-data:www-data /var/www/html/uploads

RUN chmod +x /var/www/html/old-files-cleaner.sh
COPY old-files-cleaner-cron /etc/cron.d/old-files-cleaner

WORKDIR /var/www/html

CMD ["sh", "-c", "cron && apache2-foreground"]