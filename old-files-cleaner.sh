#!/bin/sh
find /var/www/minifier.ytq.pl/uploads/ -maxdepth 1 -type d -mtime +1 -exec rm -r {} \;
