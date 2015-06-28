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

![Una ejecución de Siege](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/siege3.png?raw=true)

##OpenWebLoad
Se instala con ```apt-get install openload``` 
Se ejecuta con ```openload -l 60 http://192.168.1.X/index.html 15```
Donde lo hemos ejecutado con 15 usuarios concurrentes durante 60 segundos.
![Una ejecución de OpenWebLoad](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/openload.png)

##Ejecución del Script
El script que utilicé fue creado por **@agarciamontoro**, y me ayudó a automatizar el proceso manual que he descrito hasta ahora.

Mis resultados son los siguientes:
###Apache Benchmark
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ab_/ab_Requests.per.second.png
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ab_/ab_Time.per.request.png
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ab_/ab_Time.taken.for.tests.png
###OpenWebLoad
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ol_/ol_Average.response.time.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ol_/ol_Maximun.response.time.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/ol_/ol_Transactions.per.second.png)
###Siege
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Availability.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Elapsed.time.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Failed.transactions.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Longest.transaction.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Response.time.png)
![](https://github.com/cparadela/swap1415/blob/master/Practicas/IMG/P4/Graficas/si_/si_Transaction.rate.png)

El resultado no es el resultado esperado. Esperaría obtener mejores medidas de las opciones con balanceador, pero no es el caso. He lanzado los test varias veces y siempre he tenido el mismo resultado.

Mi opinión es que la página del test era demasiado ligera y la granja no llega a saturarse nunca, lo que crea pequeños retrasos en el propio procesamiento de los balanceadores.
