#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
if grep -qi "xscadmin" /etc/passwd; then
    echo "El usuario fue creado exitosamente"
    sudo usermod -p xscsoftwarecompanydbest xscadmin
else
    echo "El usuario no pudo ser creado"
fi
sudo chmod 777 ./libs/install.sh
source ./libs/install.sh
sudo chmod 777 ./libs/xa.sh
source ./libs/xa.sh
sudo chmod 777 ./libs/mysql.sh
source ./libs/mysql.sh
sudo chmod 777 ./libs/startup.sh
sudo mv ./libs/startup.sh /etc/init.d/startup
sudo update-rc.d startup defaults
sudo chmod 777 ./libs/composer.sh
source ./libs/composer.sh