#!/bin/bash
#Programa hecho por XSC Software Company
menuback(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Verificar que se pueda acceder a un sitio o ip"
    echo "2-Verificar la Ruta de transporte hacia una red"
    echo ""
    echo "9-Salir al menú principal"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)clear
            echo "Aquí va a poder verificar si se puede acceder a una red"
            echo "Ingrese una ip o dirección para verificar"
            read -p "Aquí:" dir
            ping $dir
        ;;
        2)clear
            echo "Aquí va a poder verificar la ruta de transporte hacia una red"
            echo "Ingrese una ip o dirección para verificar la ruta"
            read -p "Aquí:" dir
            traceroute -4 10 $dir
        ;;
        9) echo "¿Está seguro que desea volver al menú principal?"
            read -p "Si=S No=N" sal
            case $sal in
                S | s)
                    clear
                ../main.sh;;
                N | n) clear
                menuback;;
            esac
        ;;
        *) echo "La opción $opc no es válida, por favor, intente nuevamente"
            menuback
        ;;
    esac
}