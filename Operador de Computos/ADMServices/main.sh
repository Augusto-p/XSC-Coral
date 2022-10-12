#!/bin/bash
#Programa hecho por XSC Software Company

#systemctl ó systemctl list-units Este comando nos muestra los servicios cargados en el sistema mostrando información de cada servicio. Usar q para salir.
##systemctl list-unit-files. Muestra los servicios instalados en el sistema, es decir, listará los cargados y los que no. Este comando nos vendrá muy bien pasa saber como se llama el servicio que queremos ejecutar al inicio. Usar q para salir.
#systemctl start  Ejecuta en ese momento el servicio en cuestión. Si reiniciáramos el equipo no se ejecutaría ya que es una ejecución temporal.
#systemctl stop <servicio> Para temporalmente un servicio ya ejecutado.
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
    echo "1-Visualizar los procesos"
    echo ""
    echo ""
    echo ""
    echo ""
    echo "9-Salir al menú principal"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)echo "¿Desea ver los servicios instalados(tanto en uso como apagados) o solo los cargados?"
            read -p "Instalados=I   Cargados=C" $carg
            case $carg in
                I,i) systemctl list-unit-files
                    menuserv
                ;;
                C,c) systemctl
                ;;
            esac
        ;;
        2);;
        3);;
        9)clear
            ./main.sh
        ;;
        *)
            echo "La opción $opc no es válida, por favor, intente nuevamente"
            menuserv
        ;;
    esac
}