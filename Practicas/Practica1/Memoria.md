#Práctica 1
En esta práctica he preparado las máquinas para su posterior uso. Para ello he utilizado VirtualBox y UbuntuServer 12.04.
###Primera instalación
Se crea la primera máquina. Hay que añadir una nueva conexión de red interna a la que llamaré "swap".
Se  inserta la iso de UbuntuServer y se inicia. La instalación es muy sencilla.

El punto al que más hay que prestar atención es el siguiente, en el que debemos elegir LAMP y openSSH

Se reinicia cuando lo pide y continuamos añadiendo la contraseña de root, pues las prácticas las haré, en su mayoría, como root.

Instalamos curl, pues será necesario.

Configuramos la conexión interna en ```/etc/network/interfaces```
###Clonados
Vamos a clonar la máquina virtual dos veces. Reiniciaremos las MAC. La original la guardaremos y la utilizaremos, si acaso, como cliente, pero se conserva por si hay que hacer más copias de servidores.
Hay que volver a configurar la conexión interna en ```/etc/network/interfaces``` cambiando la IP.
En mi caso a los servidores les asignaré IP de la forma 192.168.1.2x (192.168.1.21 y 192.168.1.22)
Hay que tener en cuenta que, al reiniciar las MAC, las conexiones de la máquina antigua pueden no funcionar y las nuevas llamarse eth2 y eth3.
Esto se puede comprobar utilizando ```ifconfig```.

Si ese es el caso vamos ```/etc/udev/rules.d/70-persistent-net.rules``` a y borramos todo el contenido. Reiniciamos para que se vuelva a configurar bien.

Y ya está. Aquí está la screenshot de lo pedido en el guión.
