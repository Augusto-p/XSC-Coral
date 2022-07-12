#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
gdelmanage(){
    echo "¿Desea visualizar los grupos?"
    read -p "Si=Y No=N" vis
    if [ $vis == "Y" ] || [ $vis == "y" ];then
        cat /etc/group
    fi
    echo "Ingrese el nombre del grupo a eliminar"
    read -p "Aquí: " gname
    sudo groupdel $gname
    if grep -qi "$gname" /etc/group;then
        echo "El grupo que quiere eliminar no pudo ser eliminado"
        gdelmanage
    else
        echo "El grupo fue eliminado exitosamente"
        echo "¿Desea continuar?"
        read -p "Si=Y No=N" con
        if [ $con == "Y" ] || [ $con == "y" ]; then
            source ./ADM/mod.sh
        else
            source ./main.sh
        fi
    fi
}
gdelmanage