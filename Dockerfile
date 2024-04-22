FROM php:8.3.4-apache
COPY src/ /var/www/html/
RUN docker-php-ext-install pdo pdo_mysql
EXPOSE 80