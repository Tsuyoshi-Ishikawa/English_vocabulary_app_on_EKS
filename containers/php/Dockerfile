FROM php:7-fpm

RUN apt-get update && \
    mkdir /var/run/php-fpm
COPY ./code /var/www/html
COPY ./volume_conf/php-fmp/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
