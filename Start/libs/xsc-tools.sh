#!/bin/bash
#Programa Desarollado por XSC Software Company


sudo mkdir -p /var/lib/XSC

sudo mv ./libs/XSC-Tools/GU /var/lib/XSC/GU
sudo mv ./libs/XSC-Tools/OC /var/lib/XSC/OC


# add Gestor de usuarios
sudo ln -s /var/lib/XSC/GU/main.sh /usr/bin/gu
sudo ln -s /var/lib/XSC/GU/main.sh /usr/bin/GU

# add operador de computo
sudo ln -s /var/lib/XSC/OC/main.sh /usr/bin/oc
sudo ln -s /var/lib/XSC/OC/main.sh /usr/bin/OC

echo "XSC Toos Insataladas"
