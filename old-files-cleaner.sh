#!/bin/sh
find /var/www/html/uploads/ -maxdepth 1 -type d -mtime +1 -exec rm -r {} \;
