FROM php:8.3-cli-alpine

RUN apk add --no-cache \
    git \
    curl \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    autoconf \
    build-base \
    openssl-dev

RUN pecl install mongodb && docker-php-ext-enable mongodb
RUN docker-php-ext-install pcntl bcmath

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

EXPOSE 8000
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
