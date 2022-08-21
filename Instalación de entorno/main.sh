#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
sudo usermod -p xscsoftwarecompanydbest xscadmin
sudo apt update && apt upgrade
sudo apt install mysql-server
sudo apt update && apt upgrade
sudo apt install git-all
sudo apt update && apt upgrade
ipconfig
echo "Escribir la dirección ip del dispositivo"
echo "Debajo de la línea que dice: bind-address:127.0.0.0"
read -p "Presione cualquier tecla para continuar..." ne
# ne significa: No Existe
# Lo que quiere decir que esa variable no va a ser utilizada nunca
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf