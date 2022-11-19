#!/bin/bash
#Programa Desarollado por XSC Software Company

clear
Name="Coral" #folder name

sudo chown daemon $Name
sudo mv $Name /opt/lampp/htdocs/$Name
sudo chmod -R 777 /opt/lampp/htdocs/$Name

if [ ! -h ~/config.php ]; then 
    sudo ln -s /opt/lampp/htdocs/$Name/config/config.php ~/config.php
fi
sudo mysql < /opt/lampp/htdocs/$Name/DB/DB.sql #se carga la base de datos
echo "$Name Instalado Corectamente"

