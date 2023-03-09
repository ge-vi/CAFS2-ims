FROM php:8.2.3-fpm-alpine3.17

RUN apk update \
	apk upgrade

RUN apk add --update \
		$PHPIZE_DEPS \
		freetype-dev \
		git \
		curl \
		unzip \
		libjpeg-turbo-dev \
		libpng-dev \
        linux-headers \
	&& docker-php-ext-configure gd --with-jpeg --with-freetype \
	&& docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-enable pdo_mysql \
    && pecl install xdebug \
    && docker-php-ext-enable xdebug

COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"
COPY ./php.ini "${PHP_INI_DIR}/conf.d"

RUN apk add bash

COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
