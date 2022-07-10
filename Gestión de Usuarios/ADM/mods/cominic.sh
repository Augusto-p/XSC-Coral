#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
loginmanage() {
    echo "Ingrese el nuevo comentario del usuario"
    echo "ej:ramon04"
    read -p "Aquí" newusercom
    sudo usermod $username -c $newusercom
    if grep -qi "$newusercom" /etc/passwd; then
        echo "El usuario fue modificado exitosamente"
    else
        echo "El usuario no pudo ser modificado"
    fi
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
loginmanage