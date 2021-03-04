FROM php:7.3-apache
RUN apt-get update && apt-get upgrade -y
RUN docker-php-ext-install mysqli

# USER root

# CMD sudo sed -i "s/Listen 80/Listen 8081/g" /etc/apache2/ports.conf

COPY ./run-apache.sh /usr/local/bin

RUN chmod +x /usr/local/bin/run-apache.sh

RUN apt-get -y install sudo
RUN useradd -m docker && echo "docker:docker" | chpasswd && adduser docker sudo

USER docker
RUN sh /usr/local/bin/run-apache.sh

# CMD [ "run-apache.sh" ]

# RUN sed -i "s/80/${PORT}/g" /etc/apache2/ports.conf

# RUN sed -i "s/VirtualHost \*:80/VirtualHost \*:{$PORT}/g" /etc/apache2/sites-available/000-default.conf

# RUN echo "PORT NUMBER: ${PORT}"
# CMD sed -i "s/Listen 80/Listen 8081/g" /etc/apache2/ports.conf

# RUN apt-get -y install sudo

# RUN echo "docker" | sudo -S sed -i "s/VirtualHost \*:80/VirtualHost \*:8081/g" /etc/apache2/sites-available/000-default.conf

CMD apachectl -DFOREGROUND

EXPOSE 8081