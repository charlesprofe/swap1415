#Practica 3
Para esta práctica voy a configurar dos nuevos servidores para que hagan de balanceadores de carga.

Para ello, creamos dos nuevas máquinas, que serán los balanceadores de carga. Los servidores a los que enviará las peticiones serán los de la práctica 2 (a los que les habré desactivado la sincronización para distinguirlos).

##NGINX
Antes de nada, lo descargamos e instalaremos con ```apt-get install nginx```.
![Instalando Nginx](/Practicas/IMG/P3/nginx/instalando%20nginx.png)

Por defecto, nginx es un servidor en sí mismo y está configurado como tal. Por ello hay que cambiar la configuración para que actúe como balanceador. Para ello decimos varios parámetros, como a qué servidores redirigir las peticiones, (su peso, como veremos posteriormente), el puerto al que escucha, cómo cambia las cabeceras, etc.

![Configurando Nginx](/Practicas/IMG/P3/nginx/nginxconfig.png)

Una vez que terminamos de escribir el fichero de configuración, activamos nginx y vemos si da algún fallo.

![Activando Nginx](/Practicas/IMG/P3/nginx/activandonginx.png)

Para comprobar su buen funcionamiento tomamos una máquina cliente y enviamos peticiones al balanceador. Vemos que nos responde a modo round-robin. (El servidor 2 acaba con "Server 2 here").

![Probando Nginx](/Practicas/IMG/P3/prueba_balanceador1.png)

También probamos a poner distintos pesos a los servidores. Sería muy útil si, en lugar de ser prácticamente idénticos como este caso, hay una gran diferencia de potencia.

Añadimos al final de cada servidor su peso. Por defecto vale 1.

![Probando Nginx con pesos](/Practicas/IMG/P3/nginx/weighted.png)

Desde el cliente se puede ver que el servidor 1 atiende el doble de peticiones que el servidor 2.

![Probando Nginx con pesos (Cliente)](/Practicas/IMG/P3/prueba_weighted.png)

##HAPROXY
