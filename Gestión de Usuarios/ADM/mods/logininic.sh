#!/bin/bash
source ./ADM/mod.sh
source ./UserMain.sh
loginmanage() {
    echo "Ingrese el nuevo nombre de usuario"
    echo "ej:ramon04"
    read newusername
    sudo usermod $username -l $newusername
    if grep -qi "$newusername" /etc/passwd; then
        echo "El usuario fue modificado exitosamente"
        echo "¿Desea continuar?"
        echo "Y=Si"
        echo "N=No"
        echo "Ingrese Y/N"
        read con
        if [ $con == "Y" ]; then
            usermod
        else
            menuinic
        fi
    else
        echo "El usuario no pudo ser modificado"
        echo "¿Desea continuar?"
        echo "Y=Si"
        echo "N=No"
        echo "Ingrese Y/N"
        read con
        if [ $con == "Y" ]; then
            usermod
        else
            menuinic
        fi
    fi
}
