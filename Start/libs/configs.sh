#!/bin/bash
#Programa hecho por XSC Software Company

# set apache datetime to UTC or GMT-0
sudo chmod 666 /opt/lampp/etc/php.ini
echo -e "\n[Date]\ndate.imezone=UTC" >> /opt/lampp/etc/php.ini
sudo chmod 644 /opt/lampp/etc/php.ini

# set MySql datetime to UTC or GMT-0
sudo chmod 666 /etc/mysql/mysql.cnf
echo -e "\n[mysqld]\ndefault-time-zone = '+00:00'" >> /etc/mysql/mysql.cnf
sudo chmod 644 /etc/mysql/mysql.cnf
