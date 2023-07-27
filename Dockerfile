FROM wyveo/nginx-php-fpm:latest

WORKDIR /usr/share/nginx/

COPY . /usr/share/nginx/

COPY nginx.conf /etc/nginx/conf.d/default.conf

USER root

RUN chmod +x /usr/share/nginx/start.sh

RUN /usr/share/nginx/start.sh


