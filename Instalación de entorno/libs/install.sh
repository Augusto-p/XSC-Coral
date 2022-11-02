#!/bin/bash
#Programa hecho por XSC Software Company
sudo apt-get -y -qq install net-tools
sudo apt-get install sed
sudo apt-get -yq install openssh-client
if dpkg -l | grep -qi openssh-client;then
    echo "Instalado correctamente"
fi
sudo apt-get -y -qq install mysql-server
if dpkg -l | grep -qi mysql-server;then
    echo "Instalado correctamente"
fi
sudo systemctl start mysqld
sudo apt-get -y -qq install git
if dpkg -l | grep -qi git;then
    echo "Instalado correctamente"
fi

sudo apt-get update && apt-get upgrade
