#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./main.sh
clear
userana() {
    echo "Ingrese el nombre de usuario a crear"
    read username
    addproc
}
addproc() {
    if grep -qi "$username" /etc/passwd; then
        echo "El nombre de usuario ya esta en uso"
        adduser
    else
        echo "Ingrese el nombre que va a aparecer en grande"
        echo "ej:Ramon Martinez"
        read nombre
        echo "Ingrese el nombre de la carpeta de su usario"
        echo "ej:ramon"
        echo "En este caso quedaria: /home/ramon"
        read casa
        sudo useradd -d /home/$casa -c "$nombre" $username
        if grep -qi "$username" /etc/passwd; then
            echo "El usuario fue creado exitosamente"
            echo "¿Desea continuar?"
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                adduser
            else
                menuinic
            fi
        else
            echo "El usuario no pudo ser creado"
            echo "¿Desea continuar?"
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                adduser
            else
                menuinic
            fi
        fi
    fi
}
