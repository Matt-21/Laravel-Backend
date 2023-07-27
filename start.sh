#!/bin/sh

apt update && apt upgrade -y
apt install php8.2-mysql php8.2-mbstring php8.2-xml php8.2-curl 

chown nginx:nginx -R storage/
chown nginx:nginx -R bootstrap/cache

if [ -d /usr/share/nginx/vendor ]; 
then
  echo "The Directory Exists!!"
else
  composer install
fi

if [ -e /usr/share/nginx/.env ];
then 
  echo "The file Exists!!"
else
  cp .env.example .env
fi

php artisan key:generate