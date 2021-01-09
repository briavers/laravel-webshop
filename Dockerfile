FROM php:8.0-fpm

RUN pecl install redis \
    && docker-php-ext-enable redis

RUN apt update -y

RUN apt-get install -qq git curl libmcrypt-dev libjpeg-dev libpng-dev libfreetype6-dev libbz2-dev libzip-dev

RUN apt-get clean

RUN docker-php-ext-install bcmath mysqli pdo_mysql zip pcntl exif

# Install Composer
RUN curl --silent --show-error "https://getcomposer.org/installer" | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel Envoy
RUN composer global require "laravel/envoy=~1.0"
