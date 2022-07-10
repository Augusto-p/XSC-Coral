#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
groupmanage(){
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
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                source ./ADM/mod.sh
            else
                source ./main.sh
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
            echo "Y=Si"
            echo "N=No"
            echo "Ingrese Y/N"
            read con
            if [ $con == "Y" ] || [ $con == "y" ]; then
                source ./ADM/mod.sh
            else
                source ./main.sh
        fi
    fi
}
groupmanage