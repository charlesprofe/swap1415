#Práctica 6
En esta práctica voy a configurar un disco RAID y comprobar su funcionamiento.

##Creando el RAID
Lo primero es crear dos discos idénticos en el servidor en el que voy a crear el RAID. Si fuera un caso real lo que habría que  hacer es comprarlos y enchufarlos.

Al iniciar, instalamos mdadm con ```apt-get install mdadm``` con permisos de superusuario (que mantendremos siempre, igual que en el resto de prácticas).

Ahora vamos a crear el raid. Comprobamos el nombre de los discos con ```fdisk -l```

Creamos el raid

Y comprobamos que funciona bien

Ahora haremos que se monte al inicio

Hacemos la orden blkid

Y editamos /etc/fstab

##Fallo en RAID
Creamos un archivo en la carpeta montada para ver qué le ocurre durante el proceso.
Vamos a provocar un fallo en la RAID con la orden ```mdadm --manage --set-faulty``` que activa el flag de que el disco da problemas.

Lo quitamos y comrpobamos que se puede seguir accediendo al archivo ¡Incluso sin un disco!.

En la imagen se puede ver que se añade de nuevo el disco y no hay ningún problema.
