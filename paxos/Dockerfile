FROM php:7
RUN apt-get update -y && apt-get install -y openssl zip unzip git redis-server netcat net-tools vim procps curl #apache2 lynx-cur
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring 

# Enable apache mods.
#RUN a2enmod php7.0
#RUN a2enmod rewrite


# Update the PHP.ini file, enable <? ?> tags and quieten logging.
#RUN sed -i "s/short_open_tag = Off/short_open_tag = On/" /etc/php/7.0/apache2/php.ini
#RUN sed -i "s/error_reporting = .*$/error_reporting = E_ERROR | E_WARNING | E_PARSE/" /etc/php/7.0/apache2/php.ini

# Manually set up the apache environment variables
#ENV APACHE_RUN_USER www-data
#ENV APACHE_RUN_GROUP www-data
#ENV APACHE_LOG_DIR /var/log/apache2
#ENV APACHE_LOCK_DIR /var/lock/apache2
#ENV APACHE_PID_FILE /var/run/apache2.pid


WORKDIR /app
COPY . /app
RUN composer install
#RUN ./docker-ssl-cert.gen.sh

CMD ["/bin/bash", "init.sh"]

EXPOSE 80
EXPOSE 443
EXPOSE 8181