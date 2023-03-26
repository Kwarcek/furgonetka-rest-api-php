FROM php:8.0

WORKDIR /app

COPY . .

RUN apt-get update -y && \
    apt-get install git -y

RUN apt-get update && \
    apt-get install -y libpq-dev       \
            unzip                      \
            zlib1g-dev                 \
            zlib1g-dev                 \
            zip                        \
            --no-install-recommends

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

CMD /bin/bash