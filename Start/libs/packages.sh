#!/bin/bash
#Programa Desarollado por XSC Software Company


# update & upgrade package
sudo apt -qq -y update && apt -qq upgrade > /dev/null

# install net-tools(ifconfig)
sudo apt -qq -y install net-tools > /dev/null
if dpkg -l | grep -qi net-tools;then
    echo "Instalado correctamente net-tools"
else
    echo "No se a podido instalar net-tools"
fi
# install sed
sudo apt -qq install sed > /dev/null
if dpkg -l | grep -qi sed;then
    echo "Instalado correctamente sed"
else
    echo "No se a podido instalar sed"
fi

# install openssh-client
sudo apt -qq -y install openssh-client > /dev/null
if dpkg -l | grep -qi openssh-client;then
    echo "Instalado correctamente openssh-client"
else
    echo "No se a podido instalar openssh-client"
fi

# install mysql-server
sudo apt -qq -y install mysql-server > /dev/null
if dpkg -l | grep -qi mysql-server;then
    echo "Instalado correctamente mysql-server"
else
    echo "No se a podido instalar mysql-server"
fi

# install git
sudo apt -qq -y install git > /dev/null
if dpkg -l | grep -qi git;then
    echo "Instalado correctamente git"
else
    echo "No se a podido instalar git"
fi

# install unzip
sudo apt -qq  -y install unzip > /dev/null
if dpkg -l | grep -qi unzip;then
    echo "Instalado correctamente unzip"
else
    echo "No se a podido instalar unzip"
fi


