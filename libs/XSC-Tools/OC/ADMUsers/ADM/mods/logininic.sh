#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
loginmanage() {
    echo "Ingrese el nombre de usuario a modificar"
    read -p "Aquí:" username
    if grep -qi "$username" /etc/passwd; then
        loginproc
    else
        echo "El nombre de usuario no existe"
        loginmanage
    fi
}
loginproc() {
    echo "Ingrese el nuevo nombre de usuario"
    echo "ej:ramon04"
    read -p "Aquí" newusername
    sudo usermod $username -l $newusername
    if grep -qi "$newusername" /etc/passwd; then
        echo "El usuario fue modificado exitosamente"
    else
        echo "El usuario no pudo ser modificado"
    fi
    echo "¿Desea continuar?"
    read -p "Si=Y No=N" con
    if [ $con == "Y" ] || [ $con == "y" ]; then
        source /var/lib/XSC/OC/ADM/mod.sh
    else
        source /var/lib/XSC/main.sh
    fi
}
loginmanage