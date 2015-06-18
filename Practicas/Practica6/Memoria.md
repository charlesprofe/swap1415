#Práctica 6
En esta práctica voy a configurar un disco RAID y comprobar su funcionamiento.

##Creando el RAID
Lo primero es crear dos discos idénticos en el servidor en el que voy a crear el RAID. Si fuera un caso real lo que habría que  hacer es comprarlos y enchufarlos.

Al iniciar, instalamos mdadm con ```apt-get install mdadm``` con permisos de superusuario (que mantendremos siempre, igual que en el resto de prácticas).

![Instalando](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/instalando%20mdadm.png)

Ahora vamos a crear el raid. Comprobamos el nombre de los discos con ```fdisk -l```

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/fdisk%20l.png)

Creamos el raid (olvidé echar pantallazo) y comprobamos que funciona bien. 

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/montando.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/estadoRAID.png?raw=true)

##Montaje al inicio
Ahora haremos que se monte al inicio para no tenerlo que montar a mano cada vez.

Hacemos la orden blkid

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/blkid.png)

Y editamos /etc/fstab

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/fstab.png)

##Fallo en RAID
Creamos un archivo en la carpeta montada para ver qué le ocurre durante el proceso.
Vamos a provocar un fallo en la RAID con la orden ```mdadm --manage --set-faulty``` que activa el flag de que el disco da problemas.

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/faulty.png)

Lo quitamos y comprobamos que se puede seguir accediendo al archivo ¡Incluso sin un disco!.

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/sigue%20estando.png)

En la imagen se puede ver que se añade de nuevo el disco y no hay ningún problema.

![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P6/remandadd.png?raw=true)

