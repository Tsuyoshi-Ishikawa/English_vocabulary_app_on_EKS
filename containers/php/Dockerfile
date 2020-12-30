FROM php:7-fpm

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#multi stage buildがdockerではできる。一つのdockerfileで複数のimagesを使用できて、
#Aというimageの内容をBというimageにコピーしたり、使用したりできる
#https://qiita.com/yatsbashy/items/02bbbebbfe7e5a5976bc

COPY ./code/laravel /var/www/html
COPY ./volume_conf/php-fmp/zzz-www.conf /usr/local/etc/php-fpm.d/zzz-www.conf

RUN apt-get update && \
    mkdir /var/run/php-fpm && \
    cd /var/www/html && \
    php artisan config:clear && \
    chmod -R 777 storage bootstrap/cache
#最後二つのコマンドがないと以下のような状況になるので修正した
#https://qiita.com/ucan-lab/items/1ff680bb897fa11be85d
#https://qiita.com/ucan-lab/items/54575fd939b9067d1cb6
#https://qiita.com/phper_sugiyama/items/ae308c2a61aa3dbc3bf3