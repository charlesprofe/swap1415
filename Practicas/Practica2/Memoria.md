#Práctica 2
En esta práctica vamos a ver cómo mantener copias de seguridad de un servidor en otro.
Primero vamos a hacerlo de una forma más manual y rudimentaria y, posteriormente, vamos a clonar la información del servidor de forma automática y periódica.

##Utilizado tar y ssh
Se puede clonar utilizando tar y ssh, utilizando la orden a continuación.

![Envio](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/envio%20tarssh.png)

Esto utiliza tar y devuelve la salida por consola, que encauzamos con la orden ssh para enviarla al otro servidor.
Vemos que ha llegado bien a su destino.

![Recepción](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/recepcion%20tarssh.png?raw=true)

##Utilizando rsync
Lo instalamos con apt-get, en este caso ya venía instalado.

![Instalando Rsync](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/rsync.png?raw=true)

Y lo probamos, metemos la contraseña cuando nos la pida

![Probando Rsync](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/rsync%20conpassword.png)

Comprobamos que se ha copiado.

##SSH sin contraseña
Para que se haga automático, no se puede estar pidiendo la contraseña cada vez que se haga. Por ello, vamos a poner al otro servidor como servidor seguro y permitir el acceso de ssh sin contraseña.
Para ello, en el Servidor2 creamos una clave pública que enviaremos al Servidor1 para que Servidor1 no pida ya contraseña a Servidor2.
La creamos...

![Generadno Key](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/keygen.png)

Y enviamos.

![Copiando Key](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/copiar%20key.png?raw=true)

Ahora no nos pedirá contraseña al conectarnos por ssh.

![Envio sin contraseña](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/sin%20contrase%C3%B1a.png)

##Crontab. Rsync sin contraseña.
Como ya no nos pedirá contraseña, vamos hacer que las copias se hagan periódicamente.
Para ello modificamos el fichero crontab en el que están las ejecuciones periódicas de la siguiente forma.

![/etc/crontab](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/crontab.png)

Para comprobar que funciona, añadimos un fichero readme.txt a la carpeta.

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/readme%20para%20crontab.png

Como faltaba poco para que llegara la hora del crontab, espero a ver si funciona (también se puede cambiar el /etc/crontab para que los minutos se cumplan en breve, pero no fue necesario)

https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P2/funcionamiento%20correcto%20crontab.png

Y como se puede ver, se copió correctamente.
