# Docker inducido/phpmyadmin 

Simple yet sufficient PhpMyAdmin **ONLY** docker image.  
It uses the standard *stable* version that comes with debian:jessie.

> No local Mysql present!  
> You have to use it in combination with an environnement variable (-e) to indicate the Mysql Host.  
> see "How to run" below

**This image keep phpmyadmin in a /phpmyadmin (with a simple redirect) so that /var/www/html can still be used for a regular website.**


No SSL for now.

It is meant for Amazon AWS EC2, pointing to a RDS a to another EC2 instance.


## How to run


Bound to a mysql host:

	docker run -d --name pma -e PMA_HOST=<mysql IP> -p 90:80 inducido/phpmyadmin


Open to any mysql host:

	docker run -d --name pma25 -e PMA_ARBITRARY=1 -p 104:80 inducido/phpmyadmin

You can use both arguments.

## Other params

    PMA_ARBITRARY        (set to 1 to activate)
    PMA_HOST             (could be host or host:port)
    PMA_HOSTS            (a list like host1:port,host2:port,... or like host1,host2,...)
    PMA_SESSION_TIMEOUT  (corresponding PhpMyAdmin parameter)
    PMA_ABSOLUTE_URI     (corresponding PhpMyAdmin parameter)



## license

MIT
