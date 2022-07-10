#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
directoriomanage(){
    clear
    echo "Ingrese el nuevo nombre de la carpeta"
    read -p "Aquí:" newhome
}
dirproc() {
    directoriomanage
    if grep -qi "$newhome" /etc/passwd; then
        echo "El nombre de la carpeta ya esta en uso"
        directoriomanage
    else
        sudo mkdir /home/$newhome
        echo "¿Desea mover todos los archivos a la nueva carpeta?"
        echo "Y=Si"
        echo "N=No"
        echo ""
        read -p "Ingrese Y/N" con
        if [ $con == "Y" ] || [ $con == "y" ]; then
        sudo usermod $pepe -d $newhome -m
        else
            sudo usermod $pepe -d $newhome
        fi
        if grep -qi "$newhome" /etc/passwd; then
            echo "La carpeta de inicio fue modificada exitosamente"
        else
            echo "La carpeta de inicio no pudo ser modificada"
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
    fi
}
