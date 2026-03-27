FROM php:7.2-apache

RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libpq-dev \
&& rm -rf /var/lib/apt/lists/* \
&& docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr \
&& docker-php-ext-install gd mbstring pdo pdo_mysql pdo_pgsql
RUN apt-get update && \
    apt-get install -y --no-install-recommends git zip

RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli 

RUN apt-get update && apt-get install -y libmcrypt-dev \
    && pecl install mcrypt-1.0.2 \
    && docker-php-ext-enable mcrypt
    
RUN a2enmod rewrite
RUN service apache2 restart