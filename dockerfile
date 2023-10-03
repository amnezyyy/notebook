FROM php:7.4.23-fpm-alpine3.13 as base

ENV WORK_DIR /var/www/application

RUN set -xe \
    && docker-php-ext-install -j$(nproc) pdo \
    && docker-php-ext-install -j$(nproc) pdo_mysql

FROM base

COPY . ${WORK_DIR}

EXPOSE 9000
CMD ["php-fpm"]
