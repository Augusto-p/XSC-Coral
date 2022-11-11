# E-Commerce Libreria "Mi Mundo"

  

## Realizado por:

<ul>

<li>Augusto Picardo </li>

<li> Thomas Villagran </li>

<li> David Dos Santos </li>

<li> Bautista Canobra </li>

<li> Agustin Cancela </li>

</ul>

Con la especialización en el área realizada por:

David Dos Santos

## Contenido General

Se crea un script que va a manejar dos actividades mayores, las cuales son

 1. Instalación de Entorno.
 2. Operación del Sistema.

Ambos scripts son manejados en el mismo directorio, el cual es llamado como "Start".
El script de Instalación de entorno instala aplicaciónes necesarias para el uso del servidor.
El script para el Operador de Centro de Cómputos
***
## Instalación de entorno
El script de instalación va a instalar paquetes necesarios para la operación del servidor, tales como:
<ul>
<li>net-tools: Para la ayuda para las ip de los distintos equipos </li>
<li>sed: Para cambiar líneas de texto ya existentes por las deseadas</li>
<li>openssh: Para la conexión segura entre equipos</li>
<li>mysql: Para la gestión de base de datos</li>
<li>git: Para la clonación de repositorios</li>
<li>unzip: Para la descompresión de archivos</li>
</ul>
Además, este script realiza la instalación de XAMPP, clona este repositorio en la rama de Programación y lo mueve a la carpeta htdocs para la correcta ejecución del servidor.
Modifica el archivo crontab para que se creen respaldos diarios de la base de datos, además de la ejecución de XAMPP al reiniciar el equipo del servidor.
Se crean atajos para facilitar el uso del servidor para el operador de centro de cómputos, los cuales incluyen los siguientes:
<ul>
<li>alow: el cual otorga permisos de ejecución lectura y escritura para la carpeta de este proyecto</li>
<li>cloni: el cual clona y ejecuta el script de Instalación de Entorno, en caso de alguna actualización que implique amplios cambios</li>
<li>confi: el cual abre el archivo de configuración incluido en la carpeta de XSC-Coral en la rama de programación</li>
<li>cls: el cual elimina de la pantalla cualquier resultado o comando ejecutado anteriormente</li>
<li>sql: el cual permite administrar el servicio sql</li>
<li>xampp: el cual permite administrar el servicio xampp</li>
</ul>
Este script también configura archivos necesarios para el correcto uso de la base de datos.
Por último, este script añade el script de operador de cómputos como un comando que puede ser llamado en cualquier momento, el cual es "oc".
***

## Operador de Centro de Cómputos
Este script le permite a la persona escogida por la empresa la administración del servidor, con funciones como:

 1. Alta, Baja y Modificación de Grupos y Usuarios.
 2. Administración de Servicios y Procesos.
 3. Administración de Redes y Respaldos.
 4. Lectura de Registros del Sistema.

Este script permite al Operador cambiar la red a la que se encuentra conectado, gestionar el equipo en el que quiere que se respalde la base de datos, leer los registros del sistema, administrar servicios y procesos del equipo, además de la gestión de usuarios y grupos del sistema.
***
