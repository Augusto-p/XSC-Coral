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
    echo "4-Administrar los respaldos remotos"
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
        4)menubacks
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
menubacks(){
    clear
    echo "Que acción desea realizar:"
    echo ""
    echo "1-Modificar la ip del equipo a enviar los respaldos"
    echo "2-Deshabilitar la opción de respaldos remotos"
    echo "3-Cambiar el directorio a guardar los respaldos en remoto"
    echo "4-Cambiar el directorio a guardar los respaldos en local"
    echo "9-Salir al menú principal"
    read -p "Ingrese la opción aquí" opc
    case $opc in
        1)  echo "Ingrese la ip anterior del dispositivo a cambiar"
            read ipold
            echo "Ingrese la ip del nuevo dispositivo:"
            read ipn
            sed -i "s/$ipold/$ipn/g" /home/coraladmin/backs.sh
        ;;
        2)  echo "¿Está seguro que desea deshabilitar esta opción?"
            read -p "Si=S No=N" des
            case $des in
                S | s)
                    line="@daily ./backs.sh"
                sudo sed "s/$line/#/g" /var/spool/cron/crontab/coraladmin;;
                N | n) clear
                menubacks;;
            esac
        ;;
        3)
            echo "----Esto será realizado en remoto----"
            echo "Ingrese el antiguo directorio en el que se estaba guardando"
            read antdir
            echo "Ingrese el nuevo directorio en el que se debe guardar"
            read newdir
            sudo sed "s/$antdir/$newdir/g" /home/coraladmin/backs.sh
        ;;
        4)
            echo "----Esto será realizado en local----"
            echo "Ingrese el antiguo directorio en el que se estaba guardando"
            read antdir
            echo "Ingrese el nuevo directorio en el que se debe guardar"
            read newdir
            sudo sed "s/$antdir/$newdir/g" /home/coraladmin/backs.sh
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
            menubacks
        ;;
    esac
}
menuweb