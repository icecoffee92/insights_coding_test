FROM php:7.3-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli
# ENTRYPOINT []
# CMD sed -i "s/80/$PORT/g" /etc/apache2/sites-enabled/000-default.conf /etc/apache2/ports.conf && docker-php-entrypoint apache2-foreground

CMD sed -i "s/Listen 80/Listen 80 \nListen 8081/g" /etc/apache2/ports.conf

# CMD sed -i "s/Listen 80/Listen 8080/g" /etc/apache2/apache2.conf
CMD sed -i "s/VirtualHost \*:80/VirtualHost \*:8081/g" /etc/apache2/sites-available/000-default.conf
EXPOSE 8081