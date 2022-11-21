# Programa Coral

## Diseñado para: "Librería MiMundo"

## Realizado por:
<ul>
    <li> Augusto Picardo </li>
    <li> Thomas Villagran </li>
    <li> David Dos Santos </li>
    <li> Bautista Canobra </li>
    <li> Agustin Cancela </li>
</ul>

## Idea Principal:
Coral es programa hecho para que, al ejecutar un script en un servidor, instale automáticamente todo lo necesario para la ejecución de la aplicación Web.

La aplicación Web consta de varias pestañas que permiten al usuario la navegación para el acceso a libros que la librería posea y para la compra de estas, además de la posibilidad de la administración de su usuario.

## Explicación detallada del programa:
### Funcionamiento en el servidor:
Se crea un script que va a manejar dos actividades mayores, las cuales son

 1. Instalación de Entorno.
 2. Operación del Sistema.

Ambos scripts son manejados en el mismo directorio, el cual es llamado como "Start".
El script de Instalación de entorno instala aplicaciónes necesarias para el uso del servidor.
El script para el Operador de Centro de Cómputos

### Instalación de entorno:
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

### Operador de Centro de Cómputos:
Este script le permite a la persona escogida por la empresa la administración del servidor, con funciones como:

 1. Alta, Baja y Modificación de Grupos y Usuarios.
 2. Administración de Servicios y Procesos.
 3. Administración de Redes y Respaldos.
 4. Lectura de Registros del Sistema.

Este script permite al Operador cambiar la red a la que se encuentra conectado, gestionar el equipo en el que quiere que se respalde la base de datos, leer los registros del sistema, administrar servicios y procesos del equipo, además de la gestión de usuarios y grupos del sistema.

## Funcionamiento de la aplicación:

La aplicación está compuesta por pestañas como lo son :
<ul>
<li>Página de Inicio</li>
<li>Explorar</li>
<li>Sobre Nosotros</li>
<li>Registro</li>
<li>Inicio de Sesión</li>
<li>Olvidé mi Contraseña</li>
<li>Configuración de Usuario</li>
<li>Carrito de Compras</li>
<li>Panel de Control</li>
</ul>

En todas estas pestañas se encontraran tanto un menú principal, el cual mostrará opciones como lo son la gestión de Sesión, la redirección a la página principal, explorar y el sobre nosotros, además de un acceso al carrito de compras; como un Footer, o pie de página, el cual mostrará una breve descripción de la librería, redes sociales, un teléfono, una dirección de correo y los derechos reservados de la página.

### Página de Inicio:
En esta página se encuentra un Banner principal que el administrador va a poder modificar a gusto que va a mostrar promociones, ofertas, eventos, libros más vendidos o lo que sea necesario en el momento.
Por debajo se encontrará un Slider que va a mostrar libros a selección del administrador, de los cuales se mostrará una imágen principal, su precio unitario y su título.
Debajo de este primer Slider o Carrusel se verán dos banners más chicos, los cuales el administrador podrá modificar para enseñar libros u otras cosas.
Se encontrará otro Slider por debajo, con igual funcionalidad y motivo al anterior, en el cual se podrán mostrar otros libros.

### Página de Explorar:
Mostrará todos los libros disponibles de la librería, dando también la posibilidad de filtrarlos tanto como por Categorías, así como por Autores y Editoriales.
Si se clickea encima de cualquier libro nos saldrá la carátula del libro, la descripción de éste, información sobre el autor, como lo son su nombre, una foto, su nacionalidad y fecha de nacimiento, además de una breve biografía suya.
Sobre la editorial se enseña información como su nombre, su logo, su dirección, su teléfono, su correo electrónico y su página web.

### Página de Registro:
En la sección de registro se muestra una pantalla donde se pueden observar campos obligatorios a completar con la información del cliente, los cuales son: nombre, apellido, correo electrónico, contraseña, fecha de nacimiento y género, del cual, en el último caso, existe la opción “otros”, donde se debe especificar un género que no sea hombre o mujer seguido del botón de siguiente que redireccionará a la siguiente página de registro.

En la siguiente sección se deberá completar los campos obligatoriamente con información sobre la ubicación del cliente, como lo son su número de puerta, la calle de residencia, ciudad en la que vive, código postal de esta, y departamento, seguido de una sección donde nos permite agregar una foto de perfil.
Posteriormente tenemos un botón de enviar, el cual envía nuestra solicitud de registro, completando el registro exitosamente, en caso de que en el registro no se dejen campos sin completar.

### Página de Inicio de Sesión:
Luego de finalizar con el registro se nos redireccionará a la página de Inicio de Sesión (Login), en la cual se deberá ingresar la contraseña y correo electrónico (Email) de la cuenta previamente registrada.
Seguido de esto tenemos el botón entrar, el cual redireccionará a la página principal.
Debajo de la opción de “Entrar” se puede observar una opción que dice: “¿Olvidaste tu contraseña?”, la cual, al hacer clic sobre esta, va a redirigir a una página para la restauración de la misma.

### Página de Olvidé mi Contraseña:
En esta página se encuentra una opción para el ingreso de su correo electrónico, el cual deberá de ser ingresado para que, al hacer click en la opción de entrar, se envíe un correo electrónico al correo escrito con un link para la restauración de su contraseña.

### Página de Configuración de Usuario:
En esta opción podemos editar nuestra información personal, tales como el nombre, la dirección, la fecha de nacimiento y el código postal, ciudad y/o departamento, además de poder modificar la imagen de perfil.
En la opción de privacidad se podrá modificar la contraseña de la cuenta, debiendo ingresar la antigua contraseña además de la nueva.

### Página de Carrito de Compras:
En la sección carrito podemos encontrar todos los libros que hayamos agregado previamente.
Aquí se podrá visualizar la carátula del Libro, su Título, su Descripción y Precio, además de un botón que nos permite eliminar a estos del carrito.
Luego cuenta con el botón comprar, el cual enviará un formulario en el que nos enseñará el ISBN (Número que identifica un libro) , nombre del libro, el precio unitario, la cantidad y el precio total por libro, además de mostrar el total de la compra.
También se cuenta con un botón que permite eliminar el libro que se desee.
Debajo se cuenta con una opción para pagar, la cual redireccionará a una página de pago.
Luego de realizada la compra nos saldrá una ventana emergente en la cual se podrá seleccionar el método de pago con el que realizaremos la compra, además de una opción obligatoria en la que se debe ingresar un sistema de paquetería en el que se entregarán los productos.
También cuenta con un espacio para agregar una descripción de algún dato extra, como información sobre apartamentos.

### Panel de Control:
Está es una página a la que solo los usuarios con permisos de administrador y empleado pueden acceder, permitiendoles realizar modificaciones tanto en usuarios como en autores, productos y editoriales.
Además se les da una opción para la visualización de alertas de stock, la cual mostrará los libros cuya cantidad en stock sea menor a 30.
Se muestra también la opción de ver y agregar compras, la cual sirve para mantener un registro de estas, además de que podrán ver un listado de ventas de la página, mostrando información como lo es el usuario, el método de pago, los libros, la fecha, etc.
Por último, al administrador se le va a dar la opción de modificación de la página principal, posibilitando la modificación tanto de banners como de sliders de esta página.

# Gracias por leer
## En caso de sugerencias contactarse al correo: xscsoftware@gmail.com
