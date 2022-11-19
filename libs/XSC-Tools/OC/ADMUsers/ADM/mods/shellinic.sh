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
    read -p "Si=Y No=N" con
    if [ $con == "Y" ] || [ $con == "y" ]; then
        source /var/lib/XSC/OC/ADM/mod.sh
    else
        source /var/lib/XSC/main.sh
    fi
    
}
shellmanage