#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
graddmanage(){
    echo "Ingrese el nombre del grupo a crear"
    read -p "Aquí: " gname
    echo "Ingrese el GID del grupo a crear"
    read -p "Aquí: " giden
    if grep -qi "$giden" /etc/group || grep -qi "$gname" /etc/group;then
        echo "El grupo que quiere crear ya existe"
        graddmanage
    else
        sudo groupadd -g $giden $gname
        echo "El grupo fue creado exitosamente"
        echo "¿Desea continuar?"
        read -p "Si=Y No=N" con
        if [ $con == "Y" ] || [ $con == "y" ]; then
            source ./ADM/mod.sh
        else
            source ./main.sh
        fi
    fi
}
graddmanage