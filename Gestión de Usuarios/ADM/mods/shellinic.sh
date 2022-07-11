#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
shellmanage(){
echo "Ingrese el nombre de usuario a modificar"
    read -p "Aquí:" username
    if grep -qi "$username" /etc/passwd; then
    shellproc
    else
    echo "El nombre de usuario no existe"
    shellmanage
    fi  
    }
shellproc(){
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