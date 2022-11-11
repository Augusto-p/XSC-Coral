#!/bin/bash
#Programa hecho por XSC Software Company
clear
echo "Ingrese la ip del dispositivo en el que se guardaran los respaldos de base de datos"
read ipback
echo "Ingrese el usuario donde se van a respaldar las bases de datos"
echo "Por practicidad se solicita que los nombres de los usuarios sean diferentes entre ambos equipos"
read usback
echo "Ingrese la ruta en la que se va a guardar el respaldo"
read shuta
sudo mkdir /home/coraladmin/buckaps/
sudo sed -i "s/xxx.xxx.x.x/$ipback/g" "./libs/backs.sh"
sudo sed -i "s/userclient/$usback/g" "./libs/backs.sh"
sudo sed -i "s/shutabkp/$shuta/g" "./libs/backs.sh"
sudo cp ./libs/backs.sh /home/coraladmin/backs.sh