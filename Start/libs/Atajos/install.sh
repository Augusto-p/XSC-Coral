#!/bin/bash
#Programa hecho por XSC Software Company
cd ./libs/Atajos
echo "Añadiendo atajos"
sudo chmod -R 777 ./libs/
sudo mv ./libs/xampp.sh /usr/bin/xampp
sudo mv ./libs/sql.sh /usr/bin/sql
sudo mv ./libs/list.sh /usr/bin/list
sudo mv ./libs/cls.sh /usr/bin/cls
sudo mv ./libs/alow.sh /usr/bin/alow
sudo mv ./libs/confi.sh /usr/bin/confi
sudo mv ./libs/cloni.sh /usr/bin/cloni
echo "Atajos añadidos"

cd ../../