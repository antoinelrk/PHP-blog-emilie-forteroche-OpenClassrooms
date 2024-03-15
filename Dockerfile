FROM alpine:3.19

LABEL author="Antoine LRK <contact@antoinelrk.com>"
LABEL description="Basic PHP-8.3 image"
LABEL version="1.0.0"


RUN mkdir /var/www

WORKDIR /var/www

RUN apk update && \
    apk add --no-cache \
    php83 \
    php83-fpm \
    php83-mysqli \
    php83-json \
    php83-openssl \
    php83-curl \
    php83-zlib \
    php83-xml \
    php83-phar \
    php83-intl \
    php83-dom \
    php83-xmlreader \
    php83-ctype \
    php83-mbstring \
    php83-gd \
    php83-pdo \
    php83-session \
    php83-pdo_mysql

COPY . .

EXPOSE 80 8080

ENTRYPOINT ["php-fpm83", "-F"]
