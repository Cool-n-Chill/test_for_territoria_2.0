FROM php:8.2-fpm


# Обновляем список пакетов и устанавливаем необходимые пакеты
RUN apt-get update && apt-get install -y \
    apt-utils \
    runit \
    libpq-dev \
    libpng-dev \
    libzip-dev \
    zip \
    unzip \
    nodejs \
    npm \
    git

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions http
# Устанавливаем PHP расширения
RUN docker-php-ext-install bcmath gd zip pcntl

RUN curl https://getcomposer.org/installer -o /tmp/composer  \
    && php /tmp/composer --install-dir=/usr/local/bin --filename=composer \
    && chmod +x /usr/local/bin/composer

COPY --chown=www-data ./ /var/www/

USER www-data

WORKDIR /var/www

RUN composer install --ignore-platform-reqs

EXPOSE 9000
CMD ["php-fpm"]
