#!/bin/bash
#Programa Desarollado por XSC Software Company


sudo mkdir -p /var/lib/XSC

sudo mv ./libs/XSC-Tools/OC /var/lib/XSC/OC

# add operador de computo
sudo ln -s /var/lib/XSC/OC/main.sh /usr/bin/oc
sudo ln -s /var/lib/XSC/OC/main.sh /usr/bin/OC

echo "XSC Tools Insataladas"
