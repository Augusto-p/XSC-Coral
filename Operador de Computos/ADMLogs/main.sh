#!/bin/bash
path="/var/log/auth.log"
pathv2="/var/log/faillog"


echo "----- Historial De Logeos -----"

while read -r line
do
    IFS=' ' read -ra listline <<< "$line"
    echo -en " Fecha: ${listline[1]} ${listline[0]} ${listline[2]}"
    echo -en "\t Categoria: ${listline[4]}"
    echo -e "\t Mensaje: ${listline[@]:4:${#listline[@]}}"
done < "$path"

echo "----- Historial De Fallos -----"

while read -r line
do

    IFS=' ' read -ra listline <<< "$line"
    echo -en "\t Fecha: ${listline[1]} ${listline[0]} ${listline[2]}"
    echo -en "\t Servidor: ${listline[3]}"
    echo -en "\t Categoria: ${listline[4]}"
    echo -en "\t Mensaje: ${listline[@]:4:${#listline[@]}}"
done < "$pathv2"