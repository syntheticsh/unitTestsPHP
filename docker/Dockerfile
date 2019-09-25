# PHPUnit Docker Container.
FROM php:7.3-fpm-buster

RUN apt-get -y update \
    && apt-get -y install locales && echo "ru_RU.UTF-8 UTF-8" >> /etc/locale.gen && locale-gen \
    && apt-get install -y curl \
    && apt-get install -y libc-client-dev libkrb5-dev && docker-php-ext-configure imap --with-kerberos --with-imap-ssl && docker-php-ext-install imap \
    && apt-get install -y libpng-dev libfreetype6-dev libjpeg62-turbo-dev && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ && docker-php-ext-install gd \
    && apt-get install -y zlib1g-dev libzip-dev && docker-php-ext-install zip \
    && pecl install apcu && docker-php-ext-enable apcu \
    && pecl install mongodb && docker-php-ext-enable mongodb \
    && apt-get install -y libmemcached-dev && pecl install memcached && docker-php-ext-enable memcached \
    && pecl install redis && docker-php-ext-enable redis \
    && apt-get install -y libmagickwand-dev && pecl install imagick && docker-php-ext-enable imagick \
    && apt-get install -y libicu-dev && docker-php-ext-install intl \
    && docker-php-ext-install pdo_mysql mysqli pcntl sockets bcmath opcache \
    && curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet \
    && apt-get -y clean \
    && apt-get -y autoclean \
    && apt-get -y autoremove \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /root
RUN composer require phpunit/phpunit ^8.3

WORKDIR /app
CMD ["/root/vendor/bin/phpunit"]
