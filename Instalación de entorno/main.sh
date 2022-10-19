#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
if grep -qi "xscadmin" /etc/passwd; then
    echo "El usuario fue creado exitosamente"
    sudo usermod -p xscsoftwarecompanydbest xscadmin
else
    echo "El usuario no pudo ser creado"
fi
sudo chmod 777 ./install.sh
source ./install.sh
sudo chmod 777 ./xa.sh
source ./xa.sh
sudo chmod 777 ./mysql.sh
source ./mysql.sh
sudo chmod 777 startup.sh
sudo mv startup.sh /etc/init.d/startup
sudo update-rc.d startup defaults
sudo chmod 777 ./composer.sh
source ./composer.sh