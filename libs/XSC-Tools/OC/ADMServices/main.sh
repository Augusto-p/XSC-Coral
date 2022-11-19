#!/bin/bash
menuserv(){
    echo "Programa orientado al operador de centro de computos"
    echo ""
    echo ""
    echo ""
    echo "Elija una de las opciones"
    echo "1-Ejecutar o Detener un proceso"
    echo "2-Habilitar o Deshabilitar un servicio para su ejecución al arranque"
    echo "3-Verificar el estado de un servicio"
    echo "4-Reiniciar un proceso"
    echo ""
    echo "9-Salir al menú principal"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)clear
            echo "Aquí se va a poder iniciar o detener un servicio"
            echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
                *) echo "La opción $hades no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
            echo "¿Desea iniciar o detener un servicio?"
            read -p "Iniciar=I  Detener=D" stst
            case $stst in
                I | i)echo "Ingrese el código del servicio a iniciar"
                    read cod
                    systemctl start $cod
                    systemctl status $cod
                ;;
                D | d)echo "Ingrese el código del servicio a detener"
                    read cod
                    systemctl stop $cod
                    systemctl status $cod
                ;;
                *) echo "La opción $hades no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
        ;;
        2)clear
            echo "Aquí se va a poder habilitar o deshabilitar un servicio"
            echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
                *) echo "La opción $hades no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
            echo "¿Usted desea habilitar o deshabilitar un servicio?"
            read -p "Habilitar=H Deshabilitar=D" hades
            case $hades in
                H | h) echo "Ingrese el código del proceso a habilitar"
                    read codigh
                    systemctl enable $codigh
                ;;
                D | d) echo "Ingrese el código del proceso a deshabilitar"
                    read codigd
                systemctl enable $codigd;;
                *) echo "La opción $hades no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
        ;;
        3)clear
            echo "Aquí se podrán verificar el estado de un proceso"
            echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
                *) echo "La opción $carg no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
        ;;
        4)clear
            echo "Aquí se podrá reiniciar un proceso por su código"
            echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" carg
            case $carg in
                I | i) systemctl list-unit-files
                ;;
                C | c) systemctl
                ;;
                *) echo "La opción $carg no es válida, por favor, intente nuevamente"
                    menuserv
                ;;
            esac
            echo "Ingrese el código del servicio a reiniciar"
            read codre
            systemctl restart $codre
        ;;
        9) echo "¿Está seguro que desea volver al menú principal?"
            read -p "Si=S No=N" sal
            case $sal in
                S | s)
                    clear
                    cd ..
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
menuserv