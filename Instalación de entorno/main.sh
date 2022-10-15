#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
if grep -qi "xscadmin" /etc/passwd; then
    echo "El usuario fue creado exitosamente"
    sudo usermod -p xscsoftwarecompanydbest xscadmin
else
    echo "El usuario no pudo ser creado"
fi
sudo apt install net-tools
if dpkg -l | grep -qi net-tools;then
    echo "Instalado correctamente"
fi
sudo apt update && apt upgrade
sudo apt update && apt upgrade
sudo apt install openssh-server
if dpkg -l | grep -qi openssh-server;then
    echo "Instalado correctamente"
fi
systemctl enable ssh
sudo apt update && apt upgrade
sudo apt install mysql-server
if dpkg -l | grep -qi mysql-server;then
    echo "Instalado correctamente"
fi
sudo apt update && apt upgrade
sudo apt install git-all
if dpkg -l | grep -qi git;then
    echo "Instalado correctamente"
fi
sudo apt update && apt upgrade
ifconfig
echo "Escribir la dirección ip del dispositivo"
echo "Debajo de la línea que dice: bind-address:127.0.0.0"
read -p "Presione cualquier tecla para continuar..." ne
# ne significa: No Existe
# Lo que quiere decir que esa variable no va a ser utilizada nunca
git clone https://github.com/Augusto-p/GX.git
cd ./GX
sudo chmod 777 ./main
let link=$(./main)
wget -O xampp $link
sudo chmod 700 ./xampp
sudo ./xampp
sudo nano /etc/mysql/mysql.conf.d/mysqld.cnf
sudo chmod 666 /opt/lampp/etc/php.ini
sudo echo -e "\n[Date]\ndate.imezone=UTC" >> /opt/lampp/etc/php.ini
sudo chmod 644 /opt/lampp/etc/php.ini
sudo chmod 666 /etc/mysql/mysql.cnf
sudo echo -e "\n[mysqld]\ndefault-time-zone = '+00:00'" >> /etc/mysql/mysql.cnf
sudo chmod 644 /etc/mysql/mysql.cnf
sudo /etc/init.d/mysql restart
sudo chmod 777 startup.sh
sudo mv startup.sh /etc/init.d/startup
sudo update-rc.d startup defaults



#Luego de composer
#php ./DomPdfFonts/load_fonts.php Roboto-900 ./DomPdfFonts/Roboto-Black.ttf ./DomPdfFonts/Roboto-BlackItalic.ttf
#php ./DomPdfFonts/load_fonts.php Roboto-700 ./DomPdfFonts/Roboto-Bold.ttf ./DomPdfFonts/Roboto-BoldItalic.ttf
#php ./DomPdfFonts/load_fonts.php Roboto-500 ./DomPdfFonts/Roboto-Medium.ttf ./DomPdfFonts/Roboto-MediumItalic.ttf
#php ./DomPdfFonts/load_fonts.php Roboto-400 ./DomPdfFonts/Roboto-Regular.ttf ./DomPdfFonts/Roboto-Italic.ttf
#php ./DomPdfFonts/load_fonts.php Roboto-300 ./DomPdfFonts/Roboto-Light.ttf ./DomPdfFonts/Roboto-LightItalic.ttf
#php ./DomPdfFonts/load_fonts.php Roboto-100 ./DomPdfFonts/Roboto-Thin.ttf ./DomPdfFonts/Roboto-ThinItalic.ttf