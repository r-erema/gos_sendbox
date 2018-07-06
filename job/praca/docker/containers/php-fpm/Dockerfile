FROM php:7.2.7-fpm

MAINTAINER gutsout <gutsout11@gmail.com>

RUN pecl install xdebug-2.6.0 \
    && docker-php-ext-enable xdebug
RUN docker-php-ext-install mbstring
RUN docker-php-ext-install opcache