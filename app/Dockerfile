FROM php:7.3-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
RUN sed -i "s/Listen 80/Listen $PORT/g" /etc/apache2/ports.conf
EXPOSE 80