#!/bin/bash
path="/var/log/auth.log"
pathv2="/var/log/failog.log"

while read -r line
do
    IFS=' ' read -ra listline <<< "$line"
    echo "Fecha: ${listline[1]} ${listline[0]} ${listline[2]}"
    echo "Servidor: ${listline[3]}"
    echo "Categoria: ${listline[4]}"
    echo "Mensaje: ${listline[@]:4:${#listline[@]}}"
done < "$path"

while read -r line
do

    IFS=' ' read -ra listline <<< "$line"
    echo "Fecha: ${listline[1]} ${listline[0]} ${listline[2]}"
    echo "Servidor: ${listline[3]}"
    echo "Categoria: ${listline[4]}"
    echo "Mensaje: ${listline[@]:4:${#listline[@]}}"
done < "$pathv2"