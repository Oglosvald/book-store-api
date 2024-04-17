FROM php:8.3-fpm

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo_mysql

COPY ./php.ini /usr/local/etc/php/conf.d/php.ini

WORKDIR /var/www/html

EXPOSE 8000

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY artisan /var/www/html/artisan

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]