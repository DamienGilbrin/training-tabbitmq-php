FROM php:7.0-fpm

COPY php.ini /usr/local/etc/php/

COPY entrypoint.sh /usr/local/bin/entrypoint.sh

RUN apt-get update && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer


ENV PHPREDIS_VERSION 3.0.0

RUN mkdir -p /usr/src/php/ext/redis \
    && curl -L https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz | tar xvz -C /usr/src/php/ext/redis --strip 1 \
    && echo 'redis' >> /usr/src/php-available-exts \
    && docker-php-ext-install redis

EXPOSE 9000

RUN docker-php-ext-install bcmath

RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www

ENTRYPOINT ["/usr/local/bin/entrypoint.sh"]
