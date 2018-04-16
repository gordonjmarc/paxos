FROM php:7.1.8

RUN apt-get update -y && apt-get install -y openssl zip unzip git redis-server netcat net-tools vim procps curl 
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN docker-php-ext-install pdo mbstring 

WORKDIR /app
COPY . /app

RUN composer install
RUN ./docker-ssl-cert.gen.sh

CMD ["/bin/bash", "init.sh"]