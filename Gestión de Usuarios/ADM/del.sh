#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./main.sh
clear
userbor() {
    echo "Ingrese el nombre de usuario a eliminar"
    read username
    delproc
}
delproc() {
    if grep -qi "$name" /etc/passwd; then
        sudo userdel -fr $name
        if grep -qi "$name" /etc/passwd; then
            echo "El usuario no fue eliminado"
            menuinic
        else
            echo "El usuario fue eliminado exitosamente"
            echo "¿Desea continuar?"
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                deluser
            else
                menuinic
            fi

        fi
    else
        echo "El nombre de usuario no existe"
        deluser
    fi
}
