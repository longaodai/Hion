FROM php:7.3-fpm-alpine

MAINTAINER HION

# install apache 2.4.6 and ssl
RUN apk --no-cache add apache2 apache2-ssl

# tools
RUN apk --no-cache add curl git cronie at iproute2 openrc

## install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && php -r "unlink('composer-setup.php');"

RUN apk add --no-cache \
  php7 \
  php7-json \
  php7-session \
  php7-curl \
  php7-mbstring \
  php7-dom \
  php7-xml \
  php7-mysqli \
  php7-pdo \
  php7-pdo_mysql \
  php7-sqlite3 \
  php7-gd \
  php7-intl \
  php7-mcrypt \
  php7-xmlrpc \
  php7-zip \
  php7-mongodb \
  php7-xdebug \
  php7-yaml \
  php7-tokenizer \
  php7-pdo_sqlite \
  php7-bcmath \
  php7-redis \
  php7-apache2

# copy source app
COPY . /var/www/app

WORKDIR /var/www/app

ADD docker/vhost.conf /etc/apache2/conf.d/vhost.conf

# expose ports
EXPOSE 80

CMD ["/usr/sbin/httpd","-D","FOREGROUND"]