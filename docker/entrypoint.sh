#!/bin/sh

# Fail on any error
set -e

# some fix
if [ ! -n "$MEMORY_LIMIT" ] ; then
   MEMORY_LIMIT="2G"
fi
sed -i "s|\${MEMORY_LIMIT}|${MEMORY_LIMIT}|" /usr/local/etc/php/conf.d/custom.ini

cp -r /var/www/. /app

docker-php-entrypoint "$@"
