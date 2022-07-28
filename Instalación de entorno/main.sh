#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
sudo usermod -p xscsoftwarecompanydbest xscadmin
sudo apt update && apt upgrade
sudo apt install mysql-server
sudo apt update && apt upgrade
sudo apt install git-all
sudo apt update && apt upgrade
# sudo ssh-keygen -t rsa -b 4096
# echo "Ingrese la siguiente clave SSH en github para acceder"
# cat ~/.ssh/id_rsa.pub
ipconfig
echo "Escribir la dirección ip del dispositivo"
echo "Debajo de la línea que dice: bind-address:127.0.0.0"
read -p "Presione cualquier tecla para continuar..." ne
# ne significa: No Existe
# Lo que quiere decir que esa variable no va a ser utilizada nunca
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
echo "Escribir la siguiente línea para que se cree el sistema de backups"
echo " * * * 1-12 0-6 xscadmin /home/xscadmin/scripts/XSC/Instalación\de\entorno/backs.sh"
crontab -e xscadmin
mkdir /home/xscadmin/script
cd /home/xscadmin/script
#crontab -e xscadmin