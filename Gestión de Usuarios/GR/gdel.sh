#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
gdelmanage(){
    echo "Ingrese el nombre del grupo a eliminar"
    read -p "Aquí: " gname
    sudo groupdel $gname
    if grep -qi "$gname" /etc/group;then
        echo "El grupo que quiere eliminar no pudo ser eliminado"
        graddmanage
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