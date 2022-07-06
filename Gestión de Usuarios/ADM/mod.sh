#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./UserMain.sh
source ./ADM/mods/dirinic.sh
source ./ADM/mods/logininic.sh
source ./ADM/mods/passwdinic.sh
source ./ADM/mods/grupinic.sh
clear
usermodif() {
    echo "Ingrese el nombre de usuario a modificar"
    read username
}
modproc() {
    if grep -qi "$username" /etc/passwd; then
        echo "                              Modificación de Usuarios                              "
        echo -e "1-Cambiar Nombre de Usuario" "Cambiar el Nombre de Usuario a utilizar en los comandos"
        echo -e "2-Cambiar Directorio de Inicio" "Cambiar la carpeta de /home del usuario"
        echo -e "3-Cambiar la Contraseña" "Cambiar la contraseña del usuario"
        echo -e "4-Asignarle un nuevo grupo" "Agregar o cambiar los grupos a los que pertenece el usuario"
        echo -e "5-Cambiar el Shell a utilizar" "Cambiar el interpretador de comandos del usuario"
        echo -e "6-Cambiar comentario de Usuario" "Cambiar el nombre que aparece en la portada del inicio de sesión"
        read opc
        case $opc in
        1)
            loginmanage
            ;;
        2)
            directoriomanage
            ;;
        3)
            passwordmanage
            ;;
        4)  groupmanage
            ;;
        5) shellmanage
            ;;
        6) ;;
        esac

    else
        echo "El nombre de usuario no existe"
        usermodif
    fi
}
