#!/bin/bash
#Programa hecho por XSC Software Company
sudo apt -yq install net-tools
apt-get install sed
sudo apt -yq install openssh-server
if dpkg -l | grep -qi openssh-server;then
    echo "Instalado correctamente"
fi
systemctl enable ssh
sudo apt -yq install openssh-client
if dpkg -l | grep -qi openssh-client;then
    echo "Instalado correctamente"
fi
systemctl enable ssh
sudo apt -yq install mysql-server
if dpkg -l | grep -qi mysql-server;then
    echo "Instalado correctamente"
fi
sudo apt -yq install git
if dpkg -l | grep -qi git;then
    echo "Instalado correctamente"
fi

sudo apt update && apt upgrade
