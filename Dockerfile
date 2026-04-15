FROM php:8.2-apache

# NEXOS Platform — Docker Build Configuration
# Cache-bust: v2.0-nexos

# mod_rewrite modülünü aktif ediyoruz
RUN a2enmod rewrite

# Çalışma dizinini ayarlayalım
WORKDIR /var/www/html/

# Eski dosyaları temizleyelim (cache sorununu çözmek için)
RUN rm -rf /var/www/html/*

# Tüm projeyi kopyalayalım
COPY . /var/www/html/

# Klasör yetkilerini sunucunun okuyabileceği hale getirelim
RUN chown -R www-data:www-data /var/www/html/ \
    && chmod -R 755 /var/www/html/

# Render.com'un beklentisine uygun olarak varsayılan Apache portunu (80) dışa açıyoruz
EXPOSE 80
