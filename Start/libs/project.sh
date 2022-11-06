#!/bin/bash
#Programa Desarollado por XSC Software Company

#github URL
URL="git@github.com:Augusto-p/XSC-Coral.git"
Name="XSC-Coral" 
Branch="Programacion"


mkdir ProZone
cd ./ProZone
git clone --branch $Branch $URL 
sudo chown daemon $Name
sudo mv $Name /opt/lampp/htdocs/$Name
cd ..
sudo ln -s /opt/lampp/htdocs/$Name/config/config.php config.php
rm -rf ProZone
echo -e "$Name Instalado existosamente"
