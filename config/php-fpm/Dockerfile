FROM php:7.0-fpm

COPY php.ini /usr/local/etc/php/

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN apt-get update && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install bcmath

WORKDIR /var/www

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
