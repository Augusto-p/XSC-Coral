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
sudo cp ./libs/startup.sh /etc/init.d/startup
sudo update-rc.d startup defaults
sudo chmod 777 ./libs/composer.sh
source ./libs/composer.sh
cd ..
sudo mkdir -p archivos-default/files
sudo mv ./libs/backs.sh /home/xscadmin/archivos-default/backs.sh
chmod 777 /home/xscadmin/archivos-default/backs.sh
hostname -id
echo "Ingrese la ip de este dispositivo"
read iphst
sudo sed -i "s/127.0.0.1/$iphst/g" "/home/xscadmin/archivos-default/backs.sh"
echo "Ingrese la ip del dispositivo en el que se guardaran los respaldos de base de datos"
read ipback
sudo sed -i "s/xxx.xxx.x.x/$ipback/g" "/home/xscadmin/archivos-default/backs.sh"
sudo crontab -e ./libs/titanomaquia