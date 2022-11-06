#!/bin/bash
echo "Ingrese la ip del dispositivo en el que se guardaran los respaldos de base de datos"
read ipback
sudo sed -i "s/xxx.xxx.x.x/$ipback/g" "./libs/backs.sh"
sudo mv ./libs/backs.sh /home/coraladmin/backs.sh
sudo crontab -e ./titanomaquia