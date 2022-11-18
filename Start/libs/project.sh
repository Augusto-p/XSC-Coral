#!/bin/bash
#Programa Desarollado por XSC Software Company

#github URL
clear
URL="git@github.com:Augusto-p/XSC-Coral.git"
Name="XSC-Coral"
Branch="Programacion"


mkdir ProZone
cd ./ProZone
git clone --branch $Branch $URL
sudo chown daemon $Name
sudo mv $Name /opt/lampp/htdocs/$Name
sudo chmod -R 777 /opt/lamp/htdocs
cd ..
sudo ln -s /opt/lampp/htdocs/$Name/config/config.php ~/config.php
rm -rf ProZone
sudo mysql < /opt/lampp/htdocs/$Name/DB/DB.sql
echo -e "$Name Instalado existosamente"
