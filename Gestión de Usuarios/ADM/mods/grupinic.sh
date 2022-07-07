#!/bin/bash
#Aplicación diseñada y creada por XSC Software Company
source ./ADM/mod.sh
source ./main.sh
groupmanage(){
echo "¿Desea agregar, quitar o modificar los grupos del usuario?"
read -p "Agregar=A Quitar=Q Modificar=M" mod
if [ $mod == A ] || [ $mod == a ] ;then
    echo "¿Desea visualizar los grupos?"
    read -p "Si=Y No=N"

    echo "¿Desea agregar un grupo por id o por nombre?"
    read -p "Id=I Nombre=N" gru
    if [ $gru == I ] || [ $gru == i ];then
    echo "Ingrese la Id del grupo a agregar"
    read -p "Aquí:" newgroup
    fi
fi
}