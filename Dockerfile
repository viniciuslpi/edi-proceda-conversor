FROM php:8.0-cli

WORKDIR /edi

RUN apt-get update && apt-get install -y git

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY composer.json composer.lock ./

RUN composer install

COPY . .

EXPOSE 3000

CMD ["php", "-S", "0.0.0.0:3000", "-t", "/edi/public"]
