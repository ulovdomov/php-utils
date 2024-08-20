FROM php:8.1-fpm

ARG COMPOSER_TOKEN

RUN apt-get update -y
RUN apt-get install nano vim git zip libicu-dev -y
RUN apt-get upgrade -y

#RUN docker-php-ext-configure intl
#RUN docker-php-ext-install intl

RUN mkdir -p src temp log

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

RUN mkdir -p /var/www/.composer

RUN echo "{\"github-oauth\": {\"github.com\": \"${COMPOSER_TOKEN}\"}}" > /var/www/.composer/auth.json

WORKDIR /var/www/html

ADD . /var/www/html

USER root

RUN chown -R www-data:www-data /var/www
RUN chmod -R 0777 .

USER www-data

#RUN composer install --no-dev --no-interaction --optimize-autoloader

CMD ["php-fpm"]