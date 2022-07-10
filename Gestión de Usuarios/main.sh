#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
#source ./ADM/add.sh
#source ./ADM/del.sh
#source ./ADM/mod.sh

menuinic() {
    echo "      Gestión de Usuarios      "
    echo "Seleccione una opción a ejecutar"
    echo ""
    echo ""
    echo "1-Añadir Usuarios"
    echo "2-Eliminar Usuarios"
    echo "3-Modificar Usuarios"
    read opc
    case $opc in
    1) source ./ADM/add.sh ;;
    2) source ./ADM/del.sh;;
    3) source ./ADM/mod.sh;;
    esac
}
clear
menuinic
