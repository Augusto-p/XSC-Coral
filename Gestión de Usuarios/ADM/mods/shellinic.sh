#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
shellmanage(){
echo "Ingrese el nuevo Shell a utilizar"
    read -p "Aquí:" newcapa
    sudo usermod -s $newcapa $username
    echo "¿Desea continuar?"
    echo "Y=Si"
    echo "N=No"
    echo "Ingrese Y/N"
    read con
    if [ $con == "Y" ] || [ $con == "y" ]; then
        source ./ADM/mod.sh
    else
        source ./main.sh
    fi

}
shellmanage