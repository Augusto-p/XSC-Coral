#!/bin/bash
# Programa hecho por XSC Software Company
ipconfig
echo "Escribir la dirección ip del dispositivo"
echo "Debajo de la línea que dice: bind-address:127.0.0.0"
read -p "Presione cualquier tecla para continuar..." ne
# ne significa: No Existe
# Lo que quiere decir que esa variable no va a ser utilizada nunca
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
echo "Escribir la siguiente línea para que se cree el sistema de backups"
echo " * * * 1-12 0-6 xscadmin /home/xscadmin/scripts/XSC/Instalación\de\entorno/backs.sh"
mkdir /home/xscadmin/script
cd /home/xscadmin/script