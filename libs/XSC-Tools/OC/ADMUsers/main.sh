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
        1) source /var/lib/XSC/OCADM/add.sh ;;
        2) source /var/lib/XSC/OCADM/del.sh;;
        3) source /var/lib/XSC/OCADM/mod.sh;;
        4) source /var/lib/XSC/OCGR/gadd.sh;;
        5) source /var/lib/XSC/OCGR/gdel.sh;;
        6) source /var/lib/XSC/OCGR/gmod.sh;;
        9) echo "¿Está seguro que desea volver al menú principal?"
            read -p "Si=S No=N" sal
            case $sal in
                S | s)
                    clear
                    cd ..
                source /var/lib/XSC/main.sh;;
                N | n) clear
                menuinic;;
            esac
        ;;
        *)echo -e "La opción : $opc ,no es válida"
        menuinic;;
    esac
}
clear
menuinic
