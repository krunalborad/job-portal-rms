FROM php:8.2-fpm

WORKDIR /app

RUN apt-get update && apt-get install -y git curl libpng-dev libonig-dev libxml2-dev zip unzip mysql-client

RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

RUN pecl install redis && docker-php-ext-enable redis

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY composer.json composer.lock ./

RUN composer install --no-scripts --no-autoloader --prefer-dist

COPY . .

RUN composer dump-autoload

RUN mkdir -p storage/logs storage/framework && chmod -R 775 storage bootstrap/cache

EXPOSE 8000

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]