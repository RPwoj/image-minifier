#!/bin/sh
find ./ -maxdepth 1 -type d -mtime +1 -exec rm -r {} \;
