#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company

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
        source ./ADM/mod.sh
    else
       source ./main.sh
    fi
}