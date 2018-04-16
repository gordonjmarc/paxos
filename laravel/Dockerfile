FROM php:7.1.8-apache

RUN apt-get update -y && apt-get install -y openssl zip unzip git redis-server netcat net-tools vim procps curl  #apache2 libapache2-mod-php7
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring 

WORKDIR /var/www
COPY . /var/www

RUN composer install
RUN ./docker-ssl-cert.gen.sh

#APACHE CONFIG

ADD apache-config.conf /etc/apache2/sites-enabled/000-default.conf

RUN chown -R www-data:www-data /var/www
RUN usermod -u 1000 www-data && groupmod -g 1000 www-data
RUN a2enmod rewrite
RUN a2enmod php7

ENV APACHE_LOG_DIR /var/log/apache2
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2.pid

EXPOSE 80
EXPOSE 8181


CMD ["/bin/bash", "init.sh"]