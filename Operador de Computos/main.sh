#!/bin/bash
#Programa hecho por XSC Software Company
menuprin(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Administración de Servicios y Procesos"
    echo "2-Administración de Redes"
    echo "3-Administración de Respaldos"
    echo "4-Administración de Usuarios y Grupos"
    echo "5-Administración de Registros"
    echo "9-Salir"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)source ./ADMServices/main.sh;;
        2);;
        3);;
        4)source ./ADMUsers/main.sh;;
        5)source ./ADMLogs/main.sh;;
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
menuprin