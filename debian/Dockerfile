FROM debian:wheezy

MAINTAINER Nadir Boussoukaia "nadir@inducido.com"

RUN apt-get update -qq && DEBIAN_FRONTEND=noninteractive apt-get install -yqq\
    libreadline-gplv2-dev\
    libfreetype6\
    dialog\	
    apt-utils\
    net-tools\
    dialog\
    debconf-utils\
    tzdata\
    unzip\
    wget\
    curl &&\
    echo 'alias ll="ls -lah --color=auto"' >> /etc/bash.bashrc

