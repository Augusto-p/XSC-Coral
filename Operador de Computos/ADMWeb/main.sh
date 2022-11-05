#!/bin/bash
#Programa hecho por XSC Software Company
menuweb(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Verificar que se pueda acceder a un sitio o ip"
    echo "2-Verificar la Ruta de transporte hacia una red"
    echo "3-Obtener mi ip"
    echo "4-Ingresar nuevo dispositivo para recoger respaldo de Base de Datos"
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
        3) ifconfig eth0 | grep -qi "inet addr";;
        4) echo "Ingrese la ip anterior del dispositivo a cambiar"
            read ipold
            echo "Ingrese la ip del nuevo dispositivo:"
            read ipn
            grep -qi $ipold | sed -i 's/$ipold/$ipn/g' "/home/xscadmin/archivos-default/backs.sh"
        ;;
        9) echo "¿Está seguro que desea volver al menú principal?"
            read -p "Si=S No=N" sal
            case $sal in
                S | s)
                    clear
                    cd ..
                ./main.sh;;
                N | n) clear
                menuweb;;
            esac
        ;;
        *) echo "La opción $opc no es válida, por favor, intente nuevamente"
            menuweb
        ;;
    esac
}
menuweb