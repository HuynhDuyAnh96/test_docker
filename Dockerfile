# Dockerfile
FROM php:8.1-apache

# Cài ext cần thiết (pdo_pgsql để kết nối PostgreSQL)
RUN apt-get update && apt-get install -y \
    libpq-dev \
 && docker-php-ext-install pdo_pgsql

# Bật mod_rewrite (nếu cần)
RUN a2enmod rewrite

# Copy source vào thư mục web của Apache
COPY src/ /var/www/html/

# Set quyền (nếu cần)
RUN chown -R www-data:www-data /var/www/html

# Expose port (không bắt buộc khi dùng docker-compose nhưng để rõ)
EXPOSE 80

# Lệnh khởi động mặc định là của image php:8.1-apache
