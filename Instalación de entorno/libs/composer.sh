#!/bin/bash
#Programa hecho por XSC Software Company
sudo apt -yq install php-cli php-zip unzip
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
HASH="$(wget -q -O - https://composer.github.io/installer.sig)"
php -r "if (hash_file('SHA384', 'composer-setup.php') === '$HASH') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
sudo php composer-setup.php --install-dir=/usr/local/bin --filename=composer

php ./DomPdfFonts/load_fonts.php Roboto-900 ./DomPdfFonts/Roboto-Black.ttf ./DomPdfFonts/Roboto-BlackItalic.ttf
php ./DomPdfFonts/load_fonts.php Roboto-700 ./DomPdfFonts/Roboto-Bold.ttf ./DomPdfFonts/Roboto-BoldItalic.ttf
php ./DomPdfFonts/load_fonts.php Roboto-500 ./DomPdfFonts/Roboto-Medium.ttf ./DomPdfFonts/Roboto-MediumItalic.ttf
php ./DomPdfFonts/load_fonts.php Roboto-400 ./DomPdfFonts/Roboto-Regular.ttf ./DomPdfFonts/Roboto-Italic.ttf
php ./DomPdfFonts/load_fonts.php Roboto-300 ./DomPdfFonts/Roboto-Light.ttf ./DomPdfFonts/Roboto-LightItalic.ttf
php ./DomPdfFonts/load_fonts.php Roboto-100 ./DomPdfFonts/Roboto-Thin.ttf ./DomPdfFonts/Roboto-ThinItalic.ttf