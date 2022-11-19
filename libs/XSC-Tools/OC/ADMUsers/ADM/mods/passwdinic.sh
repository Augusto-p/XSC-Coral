#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
passwordmanage() {
    echo "Ingrese el nombre de usuario a modificar"
    read -p "Aquí:" username
    if grep -qi "$username" /etc/passwd; then
        passwproc
    else
        echo "El nombre de usuario no existe"
        passwordmanage
    fi
}
passwproc(){
    echo "Ingrese la nueva contraseña a ingresar"
    read -p "Aquí:" newpass
    sudo usermod -p $newpass $username
    echo "¿Desea continuar?"
    read -p "Si=Y No=N" con
    if [ $con == "Y" ] || [ $con == "y" ]; then
        source /var/lib/XSC/OC/ADM/mod.sh
    else
        source /var/lib/XSC/main.sh
    fi
}
passwordmanage