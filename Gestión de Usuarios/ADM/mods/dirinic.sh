#!/bin/bash
source ./utils/utils.sh
directoriomanage() {
    casucha
    if grep -qi "$newhome" /etc/passwd; then
        zenity --info --width 480 --text "El nombre de la carpeta ya esta en uso"
        casucha
    else
        sudo mkdir /home/$newhome
        zenity --question --width 480 --text "¿Desea mover todos los archivos a la nueva carpeta?"
        movimiento=$?
        if [ $movimiento -eq 0 ]; then
            sudo usermod $pepe -d $newhome -m
        else
            sudo usermod $pepe -d $newhome
        fi
        if grep -qi "$newhome" /etc/passwd; then
            zenity --info --width 480 --text "La carpeta de inicio fue modificada exitosamente"
        else
            zenity --error --width 480 --text "La carpeta de inicio no pudo ser modificada"
        fi
    fi
}
