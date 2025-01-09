# Use an official PHP image with Apache and FPM installed
FROM php:8.1-apache

# Install required dependencies (e.g., for Laravel)
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    zip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Enable Apache modules (rewrite, headers, etc.)
RUN a2enmod rewrite headers

# Set the working directory in the container
WORKDIR /var/www/html

# Create the custom DocumentRoot directory
RUN mkdir -p /var/www/html

# Copy the application files to the custom DocumentRoot
COPY . /var/www/html

# Set appropriate permissions for the Laravel directories
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Copy Apache configuration file (if necessary)
COPY /var/www/html/000-default.conf /etc/apache2/sites-available/000-default.conf


# Expose port 80 for Apache
EXPOSE 80

# Start Apache service
CMD ["apache2-foreground"]

