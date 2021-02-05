FROM php:8.0-apache

LABEL maintainer="laravel.com" \
    org.label-schema.docker.dockerfile="/Dockerfile" 
    
## Update package information
RUN apt-get update

## Configure Apache
RUN a2enmod rewrite \
    && sed -i 's!/var/www/html!/var/www/public!g' /etc/apache2/sites-available/000-default.conf \
    && mv /var/www/html /var/www/public

## Install Composer
RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

## Install zip libraries and extension
RUN apt-get install --yes git zlib1g-dev libzip-dev \
    && docker-php-ext-install zip

## Install intl library and extension
RUN apt-get install --yes libicu-dev \
    && docker-php-ext-configure intl \
    && docker-php-ext-install intl

## MySQL PDO support
RUN docker-php-ext-install pdo_mysql

CMD bash -c "composer install --no-dev --prefer-dist --optimize-autoloader && composer clear-cache && php artisan serve --host=0.0.0.0 --port=80"

WORKDIR /var/www