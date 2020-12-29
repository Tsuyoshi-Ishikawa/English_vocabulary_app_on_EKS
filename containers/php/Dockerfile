FROM php:7-fpm

RUN apt-get update && \
    mkdir /var/run/php-fpm
COPY ./code /var/www/html
COPY ./volume_conf/php-fmp/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#multi stage buildがdockerではできる。一つのdockerfileで複数のimagesを使用できて、
#Aというimageの内容をBというimageにコピーしたり、使用したりできる
#https://qiita.com/yatsbashy/items/02bbbebbfe7e5a5976bc
