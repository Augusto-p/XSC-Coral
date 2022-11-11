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

# modify crontab
sudo cp ./libs/Atajos/libs/list.sh /home/coraladmin/list.sh
sudo chmod 777 /var/spool/cron/crontab/coraladmin
echo -e "@daily ./backs.sh\n" >> /var/spool/cron/crontab/coraladmin
echo -e "@daily sudo /opt/lampp/xampp restart\n" >> /var/spool/cron/crontab/coraladmin
echo -e "@reboot ./home/coraladmin/list.sh\n" >> /var/spool/cron/crontab/coraladmin