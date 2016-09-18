FROM debian:jessie
MAINTAINER Nadir Boussoukaia "nadir@inducido.com"

ENV DEBIAN_FRONTEND noninteractive
RUN apt-get update 

# PHPMyAdmin
RUN echo 'phpmyadmin phpmyadmin/dbconfig-install boolean true' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/app-password-confirm password phpmyadmin_password ' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/admin-pass password root' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/mysql/app-pass password root' | debconf-set-selections
RUN echo 'phpmyadmin phpmyadmin/reconfigure-webserver multiselect apache2' | debconf-set-selections
RUN apt-get -y install phpmyadmin --no-install-recommends

RUN a2enmod rewrite
RUN a2enmod headers
RUN a2enmod vhost_alias
RUN sed -i ':a;N;$!ba;s/AllowOverride None/AllowOverride All/3' /etc/apache2/apache2.conf 

#to suppress apache warning
RUN echo ServerName phpmyadmin >> /etc/apache2/apache2.conf


RUN apt-get -y install vim-tiny --no-install-recommends
#just for top to work
RUN echo "export TERM=xterm" >> /root/.bashrc

# I just alsways have to set it
RUN echo "alias ll='ls -al'" >> /root/.bashrc

#RUN /usr/sbin/a2ensite default-ssl
#RUN /usr/sbin/a2enmod ssl

RUN apt-get clean

#in htaccess in case one wants to change it
RUN echo "php_value post_max_size 128M" >> /usr/share/phpmyadmin/.htaccess
RUN echo "php_value upload_max_filesize 128M" >> /usr/share/phpmyadmin/.htaccess

RUN mv  /etc/phpmyadmin/config.inc.php /etc/phpmyadmin/config.inc.real.php
COPY config.inc.php /etc/phpmyadmin/config.inc.php


# add a simple redirect to phpmyadmin. /var/www/html can be used for a regular website
RUN echo "<?php header('Location: /phpmyadmin'); echo 'redirect instead of apache config intentional-so that one can put a website in /var/www';" > /var/www/html/index.php
RUN rm  /var/www/html/index.html


EXPOSE 80
#EXPOSE 443

#CMD service apache2 start
CMD ["/usr/sbin/apache2ctl", "-D", "FOREGROUND"]





