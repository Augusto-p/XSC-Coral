#!/bin/bash
#Programa hecho por XSC Software Company
if ls -la | grep -qi "XSC-Coral"; then
    git clone git@github.com:Augusto-p/XSC-Coral
    cd XSC-Coral
    git switch Shell
    cd Start
    sudo chmod 777 startup.sh
    ./startup.sh
fi