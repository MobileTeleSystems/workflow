FROM php:7.1-fpm-alpine

# workdir
RUN mkdir -p /app
WORKDIR /app

# composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# git bash openssh
RUN apk --update add git bash openssh && \
    rm -rf /var/lib/apt/lists/* && \
    rm /var/cache/apk/*

# Add a non-root user to prevent files being created with root permissions on host machine.
ARG PUID=1000
ENV PUID ${PUID}
ARG PGID=1000
ENV PGID ${PGID}
RUN addgroup -g ${PUID} -S workflow &&  adduser -u ${PUID} -D -S -G workflow workflow

RUN  rm -rf /tmp/* /var/cache/apk/*

USER workflow