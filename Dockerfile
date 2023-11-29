FROM php:8.1-cli

RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev -y make
RUN docker-php-ext-install pdo pdo_pgsql zip
# RUN docker-php-ext-configure pdo pdo_pgsql

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash -
RUN apt-get install -y nodejs

WORKDIR /app

COPY . .
RUN composer install
RUN npm ci
RUN npm run build

RUN make setup