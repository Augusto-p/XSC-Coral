#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
source ./UserMain.sh
passwordmanage(){
    echo "Ingrese la nueva contraseña a ingresar"
    read -p "Aquí:" newpass
    sudo usermod -p $newpass $username
    echo "¿Desea continuar?"
    echo "Y=Si"
    echo "N=No"
    echo "Ingrese Y/N"
    read con
    if [ $con == "Y" ] || [ $con == "y" ]; then
        usermodif
    else
        menuinic
    fi
}