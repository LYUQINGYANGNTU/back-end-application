FROM oberd/php-8.0-apache

RUN apt-get update
RUN curl -s https://deb.nodesource.com/setup_16.x | bash
RUN apt-get install -y nodejs
#RUN apt-get install -y npm
RUN apt-get -y install nginx
RUN echo "ServerName localhost:80" >> /etc/apache2/apache2.conf
COPY nginx.conf /etc/nginx/nginx.conf
COPY default /etc/nginx/sites-enabled/default
COPY . /var/www/html/
EXPOSE 8082
RUN chmod 777 /var/www/html/start.sh
RUN npm install  
RUN npm install webpack-dev-server
ENTRYPOINT ["/var/www/html/start.sh"]
