#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company

commanage(){
echo "Ingrese el nombre de usuario a modificar"
    read -p "Aquí:" username
    if grep -qi "$username" /etc/passwd; then
    commproc
    else
    echo "El nombre de usuario no existe"
    commanage
    fi  
    }
commproc() {
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
commanage