#Práctica 2
En esta práctica vamos a ver cómo mantener copias de seguridad de un servidor en otro.
Primero vamos a hacerlo de una forma más manual y rudimentaria y, posteriormente, vamos a clonar la información del servidor de forma automática y periódica.

##Utilizado tar y ssh
Se puede clonar utilizando tar y ssh, utilizando la orden a continuación.

Esto utiliza tar y devuelve la salida por consola, que encauzamos con la orden ssh para enviarla al otro servidor.
Vemos que ha llegado bien a su destino.


##Utilizando rsync
Lo instalamos con apt-get

Y lo probamos, metemos la contraseña cuando nos la pida

Comprobamos que se ha copiado.

##SSH sin contraseña
Para que se haga automático, no se puede estar pidiendo la contraseña cada vez que se haga. Por ello, vamos a poner al otro servidor como servidor seguro y permitir el acceso de ssh sin contraseña.
Para ello, en el Servidor2 creamos una clave pública que enviaremos al Servidor1 para que Servidor1 no pida ya contraseña a Servidor2.
La creamos...

Y enviamos.

Ahora no nos pedirá contraseña al conectarnos por ssh.
##Crontab. Rsync sin contraseña.
Como ya no nos pedirá contraseña, vamos hacer que las copias se hagan periódicamente.
Para ello modificamos el fichero crontab en el que están las ejecuciones periódicas de la siguiente forma.

Para comprobar que funciona, esperamos y vemos el resultado:

