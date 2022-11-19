#!/bin/bash
gmodmanage(){
    echo "¿Desea visualizar los grupos?"
    read -p "Si=Y No=N" vis
    if [ $vis == "Y" ] || [ $vis == "y" ];then
        cat /etc/group
    fi
    echo "Ingrese el nombre del grupo a eliminar"
    read -p "Aquí: " gname
    if grep -qi "$gname" /etc/group ;then
        echo "¿Que acción desea realizar?"
        echo "1-Cambiar el nombre del grupo"
        echo "2-Cambiar la id del grupo"
        echo "999-Salir al menú principal"
        read opcn
        case $opcn in
            1) echo "Ingrese el nuevo nombre del grupo"
                read -p "Aquí: " newgname
                sudo usermod $gname -n $newgname
                if grep -qi "$newgname" /etc/group;then
                    echo "El grupo se modificó exitosamente"
                    echo "¿Desea continuar?"
                    read -p "Si=Y No=N" con
                    if [ $con == "Y" ] || [ $con == "y" ]; then
                        gmodmanage
                    else
                        source /var/lib/XSC/main.sh
                    fi
                fi
            ;;
            2) echo "Ingrese el nuevo Id del grupo"
                read -p "Aquí: " newgid
                sudo usermod $gname -g $newgid
                if grep -qi "$newgid" /etc/group;then
                    echo "El grupo se modificó exitosamente"
                    echo "¿Desea continuar?"
                    read -p "Si=Y No=N" con
                    if [ $con == "Y" ] || [ $con == "y" ]; then
                        gmodmanage
                    else
                        source /var/lib/XSC/main.sh
                    fi
                fi
            ;;
            *)  source ./main.sh;;
        esac
    else
        echo "El grupo que modificar no existe"
        echo "¿Desea continuar?"
        read -p "Si=Y No=N" con
        if [ $con == "Y" ] || [ $con == "y" ]; then
            gmodmanage
        else
            source /var/lib/XSC/main.sh
        fi
    fi
}
gmodmanage