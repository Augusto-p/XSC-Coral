#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company

menuinic() {
    echo " Gestión de Usuarios y grupos "
    echo "Seleccione una opción a ejecutar"
    echo ""
    echo ""
    echo "1-Añadir Usuarios"
    echo "2-Eliminar Usuarios"
    echo "3-Modificar Usuarios"
    echo "4-Crear Grupos"
    echo "5-Eliminar Grupos"
    echo "6-Modificar Grupos"
    echo "9-Salir"
    read opc
    case $opc in
        1) source ./ADM/add.sh ;;
        2) source ./ADM/del.sh;;
        3) source ./ADM/mod.sh;;
        4) source ./GR/gadd.sh;;
        5) source ./GR/gdel.sh;;
        6) source ./GR/gmod.sh;;
        9)../main.sh;;
        *)echo -e "La opción : $opc ,no es válida"
        menuinic;;
    esac
}
clear
menuinic
