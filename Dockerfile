FROM composer:latest AS vendor

COPY www .

RUN composer install \
      --no-suggest \
      --ignore-platform-reqs \
      --no-interaction \
      --no-plugins \
      --no-scripts \
      --optimize-autoloader \
      --prefer-dist

FROM php:8.2-fpm AS base
COPY --from=vendor /usr/bin/composer /usr/bin/composer

RUN apt-get update \
    && apt-get install -y --fix-missing curl git vim wget chrpath git unzip zip \
    && usermod -u 1000 www-data \
    && usermod -G staff www-data \
    && chown -R www-data:www-data /var/www \
    && chown -R www-data:www-data /var/log \
    && chmod 700 /usr/bin/composer

COPY ./docker/php.ini /usr/local/etc/php/conf.d/99_custom.ini

WORKDIR /var/www/html

COPY www .
COPY --from=vendor /app/vendor/ vendor/
