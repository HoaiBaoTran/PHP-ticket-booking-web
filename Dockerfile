FROM php:8.3.4-apache
# Enable mod_rewrite
RUN a2enmod rewrite
COPY src/ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80