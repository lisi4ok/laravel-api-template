FROM dunglas/frankenphp:1.7.0-php8.4-alpine

LABEL authors="Zaio Klepoyshkov <lisi4ok@gmail.com>"

ARG UID=${UID:-1000}
ARG UID=${UID:-1000}
#ARG USER=${USER:-user}

ENV UID=${UID}
ENV GID=${GID}
#ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
#ENV SERVER_NAME="phalcon.lo"

RUN set -eux; \
    apk update && \
    apk add --no-cache --virtual .build-deps \
        bash \
        autoconf \
        automake \
        bison \
        build-base \
        coreutils \
        ca-certificates \
        file \
        g++ \
        gperf \
        libtool \
        pkgconf \
        openssl \
        unzip \
        wget \
        curl \
        gnupg \
        gcc \
        make \
        re2c \
        libpng-dev \
        libjpeg-turbo-dev \
        postgresql-dev \
        unixodbc-dev \
        zlib-dev \
        libaio-dev \
        sqlite-dev \
        libgomp \
        freetype-dev \
        openssh-client \
        imagemagick-dev \
    ;

RUN install-php-extensions \
    @composer \
    apcu \
    bcmath \
    bz2 \
    calendar \
    exif \
    ftp \
    ffi \
    swoole \
    gd \
    gettext \
    gmp \
    intl \
    json \
    ldap \
    mbstring \
    mysqli \
    opcache \
    pcntl \
    pdo_mysql \
    pdo_pgsql \
    pdo_sqlite \
    pdo_sqlsrv \
    pdo_oci \
    pgsql \
    oci8 \
    sqlsrv \
    mongodb \
    cassandra \
    redis \
    soap \
    sockets \
    xml \
    yaml \
    xlswriter \
    uuid \
    uuid \
    timezonedb \
    tidy \
    yar \
    xdebug \
    zip \
    zmq \
    amqp \
    shmop \
    ssh2 \
    xsl \
    yaml \
    imagick \
    psr \
    zephir_parser \
    phalcon \
    ;

# Configure GD extension (only needed if gd is in the list)
RUN set -eux; \
    docker-php-ext-configure gd --with-freetype --with-jpeg;

# Final cleanup
RUN set -eux; \
    apk del .build-deps; \
    rm -rf /var/cache/apk/*; \

#USER "${USER}"
#
#RUN set -eux; \
#    addgroup --system -g "${GID}" "${USER}"; \
#    adduser --system -D -s /bin/sh -u "${UID}" -G "${USER}" "${USER}"; \
#    # Ensure necessary directories are owned by the new user
#    chown -R "${USER}":"${USER}" /data/caddy; \
#    chown -R "${USER}":"${USER}" /config/caddy;
