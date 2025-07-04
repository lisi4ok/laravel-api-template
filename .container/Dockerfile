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

# Configure php.ini
RUN cp $PHP_INI_DIR/php.ini-production $PHP_INI_DIR/php.ini; \
    sed -i "s/^memory_limit = .*/memory_limit = -1/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^max_execution_time = .*/max_execution_time = 60/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^display_errors = .*/display_errors = On/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^display_startup_errors = .*/display_startup_errors = On/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^log_errors = .*/log_errors = Off/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^memory_limit = .*/memory_limit = -1/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^post_max_size = .*/post_max_size = 10G/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^upload_max_filesize = .*/upload_max_filesize = 5G/" $PHP_INI_DIR/php.ini; \
    sed -i "s/^max_input_vars = .*/max_input_vars = 10000/" $PHP_INI_DIR/php.ini; \

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
