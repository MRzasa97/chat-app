# Start from a PHP image with Apache
FROM php:8.1-apache

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Copy your source code to the image
COPY . /var/www/html

COPY ./000-default.conf /etc/apache2/sites-available/000-default.conf

ARG ALIAS
ENV ALIAS=$ALIAS
# Set the working directory
WORKDIR /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

