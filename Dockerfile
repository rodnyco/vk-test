FROM php:8.0-cli
COPY . /.
WORKDIR /.
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer update
CMD [ "php", "./start.php" ]