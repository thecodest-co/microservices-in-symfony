FROM php:8.1

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
COPY . /app/
WORKDIR /app/

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && sync && \
    install-php-extensions amqp

RUN apt-get update \
  && apt-get install -y libzip-dev wget --no-install-recommends \
  && apt-get clean \
  && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN docker-php-ext-install zip;

CMD bash -c "cd /app && composer install && php -a"