FROM composer:latest AS composer

FROM php:7.4.0-fpm AS base
COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

COPY www .

# ---- Dependencies ----
FROM base AS dependencies

RUN composer install \
        --no-suggest \
        --ignore-platform-reqs \
        --no-interaction \
        --no-plugins \
        --no-scripts \
        --optimize-autoloader \
        --prefer-dist

# ---- Release ----
FROM base AS release

COPY --from=dependencies /var/www/html/vendor/ ./vendor

COPY . .
