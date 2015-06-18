#Práctica 5
En esta práctica haré copias de una base de datos en otra. Primero de forma manual y luego mediante la configuración maestro-esclavo.

##MySQL dump
Se ejecuta mysqldump como en la imagen. Eso crea las órdenes necesarias para restaurar la base de datos tal como está en este momento.

![Uso de MySQLdump](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/mysqldump.png)

Lo enviamos con ssh como en la práctica 2. Ahora toca meter la copia de seguridad en el esclavo:

![Volcado en base de datos](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/copia.png)

Hay que tener en cuenta que la base de datos propiamente dicha hay que crearla pues no se crea con mysqldump.

##Maestro-Esclavo
Vamos a configurar la base de datos para que, cuando se hagan operaciones en la base de datos maestra, se hagan automáticamente en la base de datos esclava.

###Maestro
Editamos el fichero ```/etc/mysql/my.cnf``` tal como se pide el guión. Se comenta la linea en la que se le asigna una IP a la base de datos y se descomentan las lineas en las que se le pone una id y se asigna un log.

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/unlock.png?raw=true
https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/restoconfig.png?raw=true

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/restart%20mysql.png
Como la versión de MySQL es mayor a la 5.5 no hay que modificar nada más.
Entramos a la base de datos maestra y creamos un nuevo usuario que utilizará la base de datos esclava. Le asignamos permisos.

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/mysql%20slave%20user.png

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/flush.png

###Esclavo
Ahora nos vamos al esclavo y editamos ```/etc/mysql/my.cnf``` igual pero asignándole un 2 a la id.
Entramos a MySQL y le asignamos el maestro. Lo tengo que hacer así porque la versión de MySQL es la 5.5. 

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/asignar%20maestro.png

Ahora pasaremos a las comprobaciones.
###Comprobaciones
Como primera comprobación, en el esclavo vemos si al ver el estado del esclavo la variable seconds behind master es 0

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/sbehindmaster.png

Para una comprobación más práctica, desbloqueamos las tablas en el maestro e insertamos algunas tuplas de prueba.

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/unlock.png
https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/insercionprueba.png?raw=true
https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P5/comprobaci%C3%B3n.png

Todo funciona y nuestras bases de datos están listas para utilizarse. 
