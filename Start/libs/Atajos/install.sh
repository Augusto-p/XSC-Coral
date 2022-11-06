#!/bin/bash
cd ./libs/Atajos
echo "Añadiendo atajos"
sudo chmod 777 ./libs/xampp.sh
sudo chmod 777 ./libs/sql.sh
sudo mv ./libs/xampp.sh /usr/bin/xampp
sudo mv ./libs/sql.sh /usr/bin/sql
echo "Atajos añadidos"

cd ../../