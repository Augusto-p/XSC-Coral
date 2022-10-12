#!/bin/bash
#Programa hecho por XSC Software Company
#systemctl enable <servicio> Prepara el servicio para la ejecución desde el arranque.
#systemctl disable <servicio> Elimina del inicio un servicio para que no vuelva a ejecutarse al arrancar el sistema.
#systemctl status <servicio> Muestra la información y el estado de un servicio.
#systemctl restart <servicio> Reinicia un servicio que se está ejecutando.
menuserv(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Ejecutar o Detener un proceso"
    echo "2-Habilitar o Deshabilitar un servicio para su ejecución al arranque"
    echo ""
    echo ""
    echo ""
    echo "9-Salir al menú principal"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)clear
        echo "Aquí se va a poder iniciar o detener un servicio"
        echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" $carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
            esac
            echo "¿Desea iniciar o detener un servicio?"
            read -p "Iniciar=I  Detener=D" $stst
            case $stst in
            I | i)echo "Ingrese el código del servicio a iniciar"
            read $cod
            systemctl start $cod
            systemctl status $cod
            ;;
            D | d)echo "Ingrese el código del servicio a detener"
            read $cod
            systemctl stop $cod
            systemctl status $cod
            ;;
            esac
        ;;
        3)clear
        echo "Aquí se va a poder habilitar o deshabilitar un servicio"
        echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" $carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
            esac
        echo "¿Usted desea habilitar o deshabilitar un servicio?"
        read -p "Habilitar=H Deshabilitar=D" $hades
        case $hades in
        H | h) ;;
        D | d) ;;
        *) echo "La opción $opc no es válida, por favor, intente nuevamente"
        menuserv
        ;;
        esac
        ;;
        9) echo "¿Está seguro que desea volver al menú principal?"
        read -p "Si=S No=N" $sal
        case $sal in
        S | s)
        clear
        ./main.sh;;
        N | n) clear
        menuserv;;
        esac
        ;;
        *)
            echo "La opción $opc no es válida, por favor, intente nuevamente"
            menuserv
        ;;
    esac
}
