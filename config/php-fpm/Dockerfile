FROM php:7.0-fpm

COPY php.ini /usr/local/etc/php/

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN apt-get update && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install bcmath

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
