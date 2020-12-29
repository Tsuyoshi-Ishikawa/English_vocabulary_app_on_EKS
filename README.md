# nginxとphpfpmをdockerで作成
nginxとphpfpmをdockerで作成し、それぞれをunixドメインで連携するようにした。

# 参考
- Nginx設定方法
https://qiita.com/Salinger/items/4d7d41c1e5dd73f0a691
https://www.slideshare.net/ttkzw/nginx-primer

- Php-fpm
https://www.bnote.net/centos/php-fpm_on_nginx.html#:~:text=PHP%2DFPM%E3%81%A8%E3%81%AF,%E3%82%88%E3%81%86%E5%AE%9F%E8%A3%85%E3%81%95%E3%82%8C%E3%81%A6%E3%81%84%E3%81%BE%E3%81%99%E3%80%82

- nginxとphp-fpmの連携
https://qiita.com/kotarella1110/items/634f6fafeb33ae0f51dc
Unix:ドメインでやりとりしている場合
https://qiita.com/u-dai/items/085e3570450aad811693
TCPでやりとりしている場合
https://qiita.com/mochizukikotaro/items/b398076cb57492980447

最強のlaravel(docker環境づくり)、
https://qiita.com/ucan-lab/items/5fc1281cd8076c8ac9f4

# docker-nginx-phpfpm

This is a simple sample.

- docker
- nginx
- php-fpm

(with Docker for Mac. )

# Prerequisites

Make sure that you installed Docker (for Mac).

Ref. [Docker for Mac](https://docs.docker.com/docker-for-mac/)

```
$ docker -v
Docker version 1.13.1-rc1, build 2527cfc

$ docker-compose -v
docker-compose version 1.10.0, build 4bd6f1a

$ docker-machine -v
docker-machine version 0.9.0, build 15fd4c7
```

# Usage

```
$ git clone git@github.com:mochizukikotaro/docker-nginx-phpfpm.git
$ cd docker-nginx-phpfpm.git
$ docker-compose up
```

Access `localhost:8080`, then you can get phpinfo. 


![2017-02-05 22 32 27](https://cloud.githubusercontent.com/assets/7911481/22626536/087ded2e-ebf3-11e6-8276-f31ac71ae05a.png)


```
$ docker-compose ps
$ docker-compose down
```
