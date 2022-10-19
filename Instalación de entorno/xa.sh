#!/bin/bash
#Programa hecho por XSC Software Company
git clone https://github.com/Augusto-p/GX.git
cd ./GX
sudo chmod 777 ./main
let link=$(./main)
wget -O xampp $link
sudo chmod 700 ./xampp
sudo ./xampp