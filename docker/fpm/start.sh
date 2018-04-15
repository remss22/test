#!/bin/bash

cd /home/eyurkin/source
php -d allow_url_fopen=on composer install
exec php-fpm
