#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
groupmanage(){
    echo "Ingrese el nombre de usuario a modificar"
    read -p "Aquí:" username
    if grep -qi "$username" /etc/passwd; then
        grouproc
    else
        echo "El nombre de usuario no existe"
        groupmanage
    fi
}
grouproc(){
    echo "¿Desea agregar o quitar grupos al usuario?"
    read -p "Agregar=A Quitar=Q" mod
    if [ $mod == "A" ] || [ $mod == "a" ] ;then
        clear
        echo "¿Desea visualizar los grupos?"
        read -p "Si=Y No=N" vis
        if [ $vis == "Y" ] || [ $vis == "y" ];then
            cat /etc/group
        fi
        echo "Ingrese la Id del grupo a agregar"
        read -p "Aquí:" groid
        sudo groupadd -g $groid $username
        echo "¿Desea continuar?"
        read -p "Si=Y No=N" con
        if [ $con == "Y" ] || [ $con == "y" ]; then
            if [ $con == "Y" ] || [ $con == "y" ]; then
                source /var/lib/XSC/OC/ADM/mod.sh
            else
                source /var/lib/XSC/main.sh
            fi
            elif [ $mod == "Q" ] || [ $mod == "q" ] ;then
            clear
            echo "¿Desea visualizar los grupos?"
            read -p "Si=Y No=N" vis
            if [ $vis == "Y" ] || [ $vis == "y" ];then
                cat /etc/group
            fi
            echo "Ingrese la Id del grupo a quitar"
            read -p "Aquí:" groid
            sudo deluser --quiet --system $username $groid
            echo "¿Desea continuar?"
            read -p "Si=Y No=N" con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                source /var/lib/XSC/OC/ADM/mod.sh
            else
                source /var/lib/XSC/main.sh
            fi
        fi
    fi
}
groupmanage