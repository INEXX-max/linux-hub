FROM php:8.2-apache

# NEXOS Platform — Docker Build v3.0
# SQLite support + mod_rewrite

# Apache mod_rewrite
RUN a2enmod rewrite

# SQLite PDO extension (required for user database)
RUN apt-get update && apt-get install -y libsqlite3-dev \
    && docker-php-ext-install pdo_sqlite \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html/

# Clean old files
RUN rm -rf /var/www/html/*

# Copy project
COPY . /var/www/html/

# Create database directory with write permissions
RUN mkdir -p /var/www/html/database

# Set permissions
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/ \
    && chmod -R 777 /var/www/html/database

EXPOSE 80
