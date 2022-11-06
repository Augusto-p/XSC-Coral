#!/bin/bash
hostname -id
echo "Ingrese la ip de este dispositivo"
read iphst
sudo sed -i "s/127.0.0.1/$iphst/g" "./libs/backs.sh"
echo "Ingrese la ip del dispositivo en el que se guardaran los respaldos de base de datos"
read ipback
sudo sed -i "s/xxx.xxx.x.x/$ipback/g" "./libs/backs.sh"
sudo crontab -e ./libs/titanomaquia