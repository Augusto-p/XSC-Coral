#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
#source ./main.sh
clear
modproc() {
    echo "                              Modificación de Usuarios                              "
    echo -e "1-Cambiar Nombre de Usuario" "Cambiar el Nombre de Usuario a utilizar en los comandos"
    echo -e "2-Cambiar Directorio de Inicio" "Cambiar la carpeta de /home del usuario"
    echo -e "3-Cambiar la Contraseña" "Cambiar la contraseña del usuario"
    echo -e "4-Asignarle un nuevo grupo" "Agregar o cambiar los grupos a los que pertenece el usuario"
    echo -e "5-Cambiar el Shell a utilizar" "Cambiar el interpretador de comandos del usuario"
    echo -e "6-Cambiar comentario de Usuario" "Cambiar el nombre que aparece en la portada del inicio de sesión"
    echo -e "7-Volver al menú principal"
    read opc
    case $opc in
        1)
            source /var/lib/XSC/OC/ADM/mods/logininic.sh
        ;;
        2)
            source /var/lib/XSC/OC/ADM/mods/dirinic.sh
        ;;
        3)
            source /var/lib/XSC/OC/ADM/mods/passwdinic.sh
        ;;
        4)
            source /var/lib/XSC/OC/ADM/mods/grupinic.sh
        ;;
        5)
            source /var/lib/XSC/OC/ADM/mods/shellinic.sh
        ;;
        6)
            source /var/lib/XSC/OC/ADM/mods/cominic.sh
        ;;
        7)
            source /var/lib/XSC/main.sh
        ;;
        *) echo -e "$opc no es una opción válida"
        modproc;;
    esac
}
modproc