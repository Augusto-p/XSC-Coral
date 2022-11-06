#!/bin/bash
#Programa Desarollado por XSC Software Company

sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
if grep -qi "xscadmin" /etc/passwd; then
    echo "El usuario Administrador fue creado exitosamente"
    sudo usermod -p xscsoftwarecompanydbest xscadmin
else
    echo "El usuario Administrador no pudo ser creado"
fi


# add execution permissions to all files in libs/
sudo chmod -R 777 ./libs/*
# call ./libs/packages.sh
echo "Instalando Paquetes"
source ./libs/packages.sh
echo "Paquetes instalados"
# call ./libs/xampp.sh
echo "Instalando Xampp"
source ./libs/xa.sh
echo "Xampp instalado"
# call ./libs/Atajos/install.sh
source ./libs/Atajos/install.sh

# start services
sql start # start mysql server
xampp startapache # start apache in xampp


# no se que hace esto
source ./libs/nose.sh

# call ./libs/xsc-tools.sh (install XSC Tools)
source ./libs/xsc-tools.sh

#call ./libs/project.sh (install Coral)
source ./libs/project.sh





