FROM dunglas/frankenphp:1.7.0-php8.4-alpine

LABEL authors="Zaio Klepoyshkov <lisi4ok@gmail.com>"
LABEL description="Alpine Linux | PHP 8.4 | FrankenPHP"
LABEL version="0.0.1"
LABEL extensions="php, composer, apcu, bcmath, bz2, calendar, exif, ftp, ffi, geos, grpc, swoole, gd, gettext, gmp, intl, imap, json, ldap, oauth, mbstring, mysqli, opcache, pcntl, pcov, pdo_mysql, pdo_pgsql, pdo_sqlite, pdo_sqlsrv, pdo_oci, pgsql, oci8, sqlsrv, mongodb, cassandra, redis, soap, solr, sockets, decimal, event, ev, dba, sync, csv, xml, yaml, xsl, xlswriter"

ARG USER=${USER:-user}
ARG UID=${UID:-1000}
ARG GID=${GID:-1000}
ARG ENVIRONMENT=${ENVIRONMENT:-production}
# Set environment variables from PHP
ARG PHP_INI_DIR=${PHP_INI_DIR:-"/usr/local/etc/php"}

ENV UID=${UID}
ENV GID=${GID}
ENV ENVIRONMENT=${ENVIRONMENT}
#ENV FRANKENPHP_CONFIG="worker /app/public/index.php"
#ENV SERVER_NAME="phalcon.lo"

RUN set -eux; \
    apk update && \
    apk add --no-cache --virtual .build-deps \
        bash \
        autoconf \
        automake \
        build-base \
        coreutils \
        bison \
        ca-certificates \
        tar \
        xz \
        file \
        gperf \
        libtool \
        pkgconf \
        openssl \
        vim \
        zip \
        unzip \
        wget \
        curl \
        gcc \
        g++ \
        make \
        m4 \
        re2c \
        libc-dev \
        pcre-dev \
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
        imap-dev \
        gmp-dev \
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
    geos \
    grpc \
    swoole \
    gd \
    gettext \
    gmp \
    intl \
    imap \
    json \
    ldap \
    oauth \
    mbstring \
    mysqli \
    opcache \
    pcntl \
    pcov \
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
    solr \
    sockets \
    decimal \
    event \
    ev \
    dba \
    sync \
    csv \
    xml \
    yaml \
    xsl \
    xlswriter \
    xpass \
    xmldiff \
    xmlrpc \
    uv \
    uuid \
    timezonedb \
    tidy \
    yar \
    xdebug \
    zip \
    uploadprogress \
    zmq \
    nsq \
    pq \
    zstd \
    amqp \
    shmop \
    inotify \
    ssh2 \
    imagick \
    psr \
    zephir_parser \
    phalcon \
    ;

# Configure GD extension
RUN docker-php-ext-configure gd --with-freetype --with-jpeg;

# Configure php.ini
RUN cp -if ${PHP_INI_DIR}/php.ini-production ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^display_errors = .*/display_errors = On/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^display_startup_errors = .*/display_startup_errors = On/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^log_errors = .*/log_errors = Off/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^memory_limit = .*/memory_limit = -1/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^max_execution_time = .*/max_execution_time = 0/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^max_input_time = .*/max_input_time = -1/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^post_max_size = .*/post_max_size = 10G/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^upload_max_filesize = .*/upload_max_filesize = 5G/" ${PHP_INI_DIR}/php.ini; \
    sed -i "s/^error_reporting = .*/error_reporting = E_ALL/" ${PHP_INI_DIR}/php.ini;

# Final cleanup
RUN set -eux; \
    apk del .build-deps; \
    rm -rf /var/cache/apk/*;

# Set user
#RUN \
#    adduser --system --no-create-home --gid=${GID} --uid=${UID} ${USER}; \
#    setcap -r /usr/local/bin/frankenphp; \
#    chown -R ${USER}:${USER} /data/caddy; \
#    chown -R ${USER}:${USER} /config/caddy; \
#    chown -R ${USER}:${USER} /app; \
#
#
#USER ${USER}
