#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
clear
userbor() {
    echo "Ingrese el nombre de usuario a eliminar"
    read username
    delproc
}
delproc() {
    if grep -qi "$username" /etc/passwd; then
        sudo userdel -fr $username
        if grep -qi "$username" /etc/passwd; then
            echo "El usuario no fue eliminado"
        else
            echo "El usuario fue eliminado exitosamente"
        fi
    else
        echo "El nombre de usuario no existe"
        userbor
    fi
    echo "¿Desea continuar?"
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                userbor
            else
                source ./main.sh
            fi
}
userbor