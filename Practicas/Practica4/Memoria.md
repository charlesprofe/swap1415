#Práctica 4
En esta práctica vamos a ver el rendimiento de los servidores.
Voy a utilizar las 2 herramientas del guión (Apache Benchmark y Siege) y una adicional (OpenWebLoad)
En los servidores, modifica index de acuerdo a esta imagen:
![Pagina Prueba](/Practicas/IMG/P4/pagina_test.png)

La IP de los servidores individuales en este caso es 192.168.1.21 y 192.168.1.22 y la de los balanceadores es 192.168.1.11 para nginx y 192.168.1.12 para haproxy.
##Apache Benchmark
Se instala con ```apt-get install apache2-utils``` 
Se ejecuta (en mi caso) con ```ab -n 1000 -c 15 http://192.168.1.X/index.html```
1000 son las iteraciones y 15 el número de clientes concurrentes.
Donde X vale según sobre qué equipo queremos hacer la prueba.

##Siege
Se instala con ```apt-get install siege```. He tenido problemas intentando instalarlo en Ubuntu Server (apt-get no encontraba el paquete) sin embargo, en Ubuntu normal si funcionaba.

Se ejecuta con ```siege -b -c 15 -t60S http://192.168.1.X/index.html```
Donde lo hemos ejecutado con 15 usuarios concurrentes durante 60 segundos.

##OpenWebLoad
Se instala con ```apt-get install openload``` 
Se ejecuta con ```openload -l 60 http://192.168.1.X/index.html 15```
Donde lo hemos ejecutado con 15 usuarios concurrentes durante 60 segundos.
