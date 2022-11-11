#!/bin/bash
bd="libreria"
fecha=$(date +%d-%m-%Y_%h-%M)
name="respaldo_${bd}_${fecha}"
mysql -u usuariobackup -pf5fa8480b5b9fd7d3034ee03be13129c965d5aec < buckaps/"${name}".sql
sudo scp -rq coraladmin@127.0.0.1:buckaps/"${name}".sql userclient@xxx.xxx.x.x:/shutabkp