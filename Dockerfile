# WeDrive — PHP/Apache runtime image
# Replaces the previously-injected Next.js/Bun Dockerfile (this is a PHP app).
FROM php:8.2-apache

# System libs for the PHP extensions we need (pdo_mysql, gd for image handling).
RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        libpng-dev \
        libjpeg62-turbo-dev \
        libfreetype6-dev \
        unzip \
        git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j"$(nproc)" pdo_mysql mysqli gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite (clean URLs / front controller friendliness).
RUN a2enmod rewrite

# Recommended production-ish PHP settings.
RUN { \
        echo 'display_errors=Off'; \
        echo 'log_errors=On'; \
        echo 'upload_max_filesize=16M'; \
        echo 'post_max_size=16M'; \
    } > /usr/local/etc/php/conf.d/wedrive.ini

# Install Composer from the official image.
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Install PHP dependencies first (better layer caching).
COPY composer.json ./
RUN composer install --no-dev --no-interaction --prefer-dist --no-scripts --no-autoloader || true

# Copy the application source.
COPY . .

# Generate the optimized autoloader now that all source is present.
RUN composer dump-autoload --optimize --no-dev || true

# The app's HTML entrypoints live under View/; serve the project root so the
# existing relative require paths (../../Model, ../../Controller) keep working.
RUN chown -R www-data:www-data /var/www/html

EXPOSE 80
