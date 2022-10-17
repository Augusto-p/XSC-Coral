#!/bin/bash
# Programa hecho por XSC Software Company
sudo useradd -d /home/xscadmin -c "Administrador" xscadmin
if grep -qi "xscadmin" /etc/passwd; then
    echo "El usuario fue creado exitosamente"
    sudo usermod -p xscsoftwarecompanydbest xscadmin
else
    echo "El usuario no pudo ser creado"
fi
sudo ./install.sh
ifconfig
echo "Escribir la dirección ip del dispositivo:"
read $ip
sudo echo "bind-address:$ip" >> /etc/mysql/mysql.conf.d/mysqld.cnf
git clone https://github.com/Augusto-p/GX.git
cd ./GX
sudo chmod 777 ./main
let link=$(./main)
wget -O xampp $link
sudo chmod 700 ./xampp
sudo ./xampp
cd
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