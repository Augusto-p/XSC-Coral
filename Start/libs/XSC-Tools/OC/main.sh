#!/bin/bash
#Programa hecho por XSC Software Company
menuprin(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Administración de Servicios y Procesos"
    echo "2-Administración de Redes y Respaldos"
    echo "3-Administración de Usuarios y Grupos"
    echo "4-Administración de Registros"
    echo "9-Salir"
    read -p "Ingrese la opción aquí: " opc
    case $opc in
        1)source ./ADMServices/main.sh;;
        2)source ./ADMWeb/main.sh;;
        3)source ./ADMUsers/main.sh;;
        4)source ./ADMLogs/main.sh;;
        9) echo "Gracias por hacer uso de esta aplicación, tenga un buen día"
            clear
            exit
        ;;
        *)
            echo "La opción $opc no es válida, por favor, intente nuevamente"
            menuprin
        ;;
    esac
}
clear
cd /var/lib/XSC/
menuprin