#!/bin/bash
echo "docker" | sudo -S sed -i "s/80/${PORT:-80}/g" /etc/apache2/ports.conf docker-php-entrypoint

echo "docker" | sudo -S sed -i "s/VirtualHost \*:80/VirtualHost \*:${PORT:-80}/g" /etc/apache2/sites-available/000-default.conf

echo "PORT NUMBER: ${PORT:-80}"