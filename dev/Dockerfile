FROM php:8.2-apache

RUN docker-php-ext-install mysqli \
    && apt-get update \
    && apt-get install -y mariadb-server \
    && rm -rf /var/lib/apt/lists/* \
    && mkdir -p /var/www/html/userImages \
    && chown -R www-data:www-data /var/www/html/userImages

COPY dev/entrypoint.sh /entrypoint.sh
COPY dev/init.sql /init.sql
RUN chmod +x /entrypoint.sh

EXPOSE 80
ENTRYPOINT ["/entrypoint.sh"]
