# Gunakan image PHP dengan FPM
FROM php:8.2-fpm

# Install dependencies sistem
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    pkg-config \
    libzip-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql zip \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Set working directory
WORKDIR /var/www/html

# Salin file aplikasi
COPY . /var/www/html

# Expose port 9000
EXPOSE 9000

# Jalankan server PHP-FPM
CMD ["php-fpm"]
