#!/bin/bash
#Programa Desarollado por XSC Software Company

mkdir GX
cd ./GX
link="https://downloads.sourceforge.net/project/xampp/XAMPP%20Linux/7.4.27/xampp-linux-x64-7.4.27-2-installer.run?ts=gAAAAABjZrVEWOfkd6A6O6H6vaSsC_-1_YfnABrn6uB_ZA1m5coEoKnSO0j3Z5Klrsu1FnRYLtvXOJZPl434KtptmKhuBFMwbw%3D%3D&r=https%3A%2F%2Fsourceforge.net%2Fprojects%2Fxampp%2Ffiles%2FXAMPP%2520Linux%2F7.4.27%2Fxampp-linux-x64-7.4.27-2-installer.run%2Fdownload"
wget -O xampp $link > /dev/null
sudo chmod 700 xampp
sudo ./xampp
cd ..
sudo rm -rf GX
echo "XAMPP instalado Corectamente"