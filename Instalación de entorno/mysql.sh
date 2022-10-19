#!/bin/bash
#Programa hecho por XSC Software Company
ifconfig
echo "Escribir la dirección ip del dispositivo:"
read $ip
sudo echo "bind-address:$ip" >> /etc/mysql/mysql.conf.d/mysqld.cnf
sudo chmod 666 /opt/lampp/etc/php.ini
sudo echo -e "\n[Date]\ndate.imezone=UTC" >> /opt/lampp/etc/php.ini
sudo chmod 644 /opt/lampp/etc/php.ini
sudo chmod 666 /etc/mysql/mysql.cnf
sudo echo -e "\n[mysqld]\ndefault-time-zone = '+00:00'" >> /etc/mysql/mysql.cnf
sudo chmod 644 /etc/mysql/mysql.cnf
sudo /etc/init.d/mysql restart