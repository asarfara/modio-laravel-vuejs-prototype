FROM nginx:latest

COPY conf/*.conf /etc/nginx/conf.d/
COPY ssl/mod.io.dev.internal.crt /etc/nginx/mod.io.dev.internal.crt
COPY ssl/mod.io.dev.internal.key /etc/nginx/mod.io.dev.internal.key

RUN usermod -u 1000 www-data
