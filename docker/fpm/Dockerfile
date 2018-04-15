FROM bitnami/php-fpm

RUN mkdir -p /home/eyurkin/source/storage/framework/sessions &&\
    mkdir -p /home/eyurkin/source/storage/framework/cache &&\
    mkdir -p /home/eyurkin/source/storage/framework/views &&\
    mkdir -p /home/eyurkin/source/storage/logs &&\
    mkdir -p /var/log/app

WORKDIR /home/eyurkin/source/
#COPY start.sh /start.sh
#RUN chmod +x /start.sh
#CMD ["php-fpm", "/start.sh"]