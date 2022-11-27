FROM arm64v8/php:8.1-apache-buster

SHELL ["/bin/bash", "-o", "pipefail", "-c"]

# install modules
RUN apt-get update \
    # apt-get install
    && apt-get install -y --no-install-recommends \
    unzip git vim zsh \
    libzip-dev libicu-dev libpq-dev \
    libfreetype6-dev libjpeg62-turbo-dev libpng-dev \
    # docker-php-ext-install
    && docker-php-ext-install \
    gd intl zip \
    pdo_pgsql pgsql \
    # others
    && a2enmod rewrite \
    # clear cache
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# configure modules
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-configure gd --with-freetype --with-jpeg

# composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# for file permissions
ARG WWW_USER_ID=${WWW_USER_ID}
ARG WWW_GROUP_ID=${WWW_GROUP_ID}
RUN usermod -u $WWW_USER_ID -o www-data
RUN groupmod -g $WWW_GROUP_ID -o www-data

WORKDIR /var/www/html

EXPOSE 80 443
