#!/bin/bash
#Programa hecho por XSC Software Company
echo "Ingrese la ip del dispositivo en el que se guardaran los respaldos de base de datos"
read ipback
sudo mkdir /home/coraladmin/buckaps/
sudo sed -i "s/xxx.xxx.x.x/$ipback/g" "./libs/backs.sh"
sudo mv ./libs/backs.sh /home/coraladmin/backs.sh
sudo crontab /home/coraladmin/XSC-Coral/Start/libs/titanomaquia