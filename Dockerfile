FROM php:8.2-fpm-alpine


RUN apk add --no-cache \
    nginx \
    supervisor \
    shadow \
    bash \
    git \
    zip \
    unzip \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    libxml2-dev \
    libzip-dev \
    postgresql-dev

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo_mysql pdo_pgsql pgsql bcmath gd zip opcache



COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www


COPY . .


RUN composer install --no-dev --optimize-autoloader --no-interaction


RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache


EXPOSE 10000

CMD ["sh", "-c", "php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force && php -S 0.0.0.0:10000 -t public"]
