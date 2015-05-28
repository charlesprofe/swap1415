#LUSTRE
####Carlos Paradela Pérez
##¿Qué es LUSTRE?
Lustre es un sistema de archivos distribuido, que está pensado para servir grandes volúmenes de datos a gran cantidad de clientes.

El sistema de archivos LUSTRE permite a los usuarios escribir en un mismo archivo simultáneamente, así como utilizar archivos de distintas localidades de forma eficiente.

Todo esto de forma transparente al usuario.

Estas características hacen que sean muy utilizados en supercomputadores (muchísimos discos pretenderían parecer un único sistema de archivos, lo cual es parte de la magia de LUSTRE) y en sistemas muy distribuidos como por ejemplo compañías meteorológicas.

##¿De qué se compone LUSTRE?

Las componentes del sistema LUSTRE se distribuyen para evitar los cuellos de botella.
![img](https://wiki.hpdd.intel.com/download/attachments/6586950/basic_layout.png?version=5&modificationDate=1304324082000&api=v2)
###MDS
Un MetaData Server es el encargado de gestionar los metadatos de los archivos, es decir: los permisos, la ubicación, las propiedades, etc.

Se componen de MGS (ManaGemet Server) y MDT (MetaData Target).
El MDS gestiona un punto de acceso al cliente. Es el que se encarga de recibir la petición del cliente y procesarla.
El MDT es el encargado de guardar los metadatos propiamente dichos para ponerlos a disposición del MDS.

###OSS
Un Object Storage Server es el encargado de almacenar los archivos. Actúan bajo demanda del MDS asociado y sirven en corresponencia sin tener que preocuparse de nada sobre cosas como los permisos, buscar el archivo, etc.

Se compone de OSS y OST.
El OSS recibe la petición del MGS y la transforma en una petición a uno de sus OST (puede haber varios OST asociados a un único OSS) y la sirve directamente al cliente.

##ZFS
Es común en sistemas de LUSTRE utilizar ZFS como sistema de ficheros subyacente. Esto es debido a que permite gestionar gran cantidad de datos de forma eficiente y fácil.

Cabe destacar que permite definir Pools, es decir, agrupaciones de discos a nivel de software que permite gestionarlas como uno solo. Así se pueden hacer RAID y otro tipo de agrupaciones comunes.

##Instalando LUSTRE
Actualmente LUSTRE trabaja mejor con distribuciones de Red Hat. El soporte a CentOS 7 aún no está disponible así que se instalará en CentOS 6.6. Todas las operaciones se harán a nivel de superusuario.

####Intalamos el repositorio EPEL
```yum localinstall --nogpgcheck https://download.fedoraproject.org/pub/epel/6/x86_64/epel-release-6-8.noarch.rpm```
####Y el sistema de ficheros ZFS
```yum localinstall --nogpgcheck http://archive.zfsonlinux.org/epel/zfs-release.el6.noarch.rpm
yum install kernel-devel zfs```
####Ahora instalamos LUSTRE
```yum install lustre
yum install lustre-osd-zfs```

´´´mkdir ./lustreinstall

printf "https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/kernel-2.6.32-504.16.2.el6_lustre.ge2556aa.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/kernel-firmware-2.6.32-504.16.2.el6_lustre.ge2556aa.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/lustre-2.7.54-2.6.32_504.16.2.el6_lustre.ge2556aa.x86_64_gc19992e.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/lustre-modules-2.7.54-2.6.32_504.16.2.el6_lustre.ge2556aa.x86_64_gc19992e.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/lustre-tests-2.7.54-2.6.32_504.16.2.el6_lustre.ge2556aa.x86_64_gc19992e.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/lustre-osd-ldiskfs-2.7.54-2.6.32_504.16.2.el6_lustre.ge2556aa.x86_64_gc19992e.x86_64.rpm\n
https://build.hpdd.intel.com/job/lustre-master/arch=x86_64,build_type=server,distro=el6.6,ib_stack=inkernel/lastStableBuild/artifact/artifacts/RPMS/x86_64/lustre-osd-ldiskfs-mount-2.7.54-2.6.32_504.16.2.el6_lustre.ge2556aa.x86_64_gc19992e.x86_64.rpm\n
https://build.hpdd.intel.com/job/e2fsprogs-master/arch=x86_64,distro=el6/lastStableBuild/artifact/_topdir/RPMS/x86_64/e2fsprogs-1.42.12.wc1-7.el6.x86_64.rpm\n
https://build.hpdd.intel.com/job/e2fsprogs-master/arch=x86_64,distro=el6/lastStableBuild/artifact/_topdir/RPMS/x86_64/e2fsprogs-libs-1.42.12.wc1-7.el6.x86_64.rpm\n
https://build.hpdd.intel.com/job/e2fsprogs-master/arch=x86_64,distro=el6/lastStableBuild/artifact/_topdir/RPMS/x86_64/libss-1.42.12.wc1-7.el6.x86_64.rpm\n
https://build.hpdd.intel.com/job/e2fsprogs-master/arch=x86_64,distro=el6/lastStableBuild/artifact/_topdir/RPMS/x86_64/libcom_err-1.42.12.wc1-7.el6.x86_64.rpm" > ./download

wget -i ./download

yum localinstall ./kernel*

yum localinstall ./lustre-* ./e2fsprogs-*  ./libss-* ./libcom*

´´´



Como LUSTRE no forma parte de la política SELinux, hay que desactivar SELinux en /etc/selinux/config, poniendo la opción correspondiente a disable.

####Desactivamos las tablas IP puesto que tendríamos que configurar el cortafuegos.
```chkconfig iptables off ; chkconfig ip6tables off
service iptables stop ; service ip6tables stop```

#####Configuramos la red interna para conectarse con otras máquinas. 
Necesitan una conexión activa y visible para el siguiente paso.

```echo “options lnet networks=tcp0(eth1)” >> /etc/modprobe.d/lustre.conf    
para decirle a lustre que utilice eth1 (la red interna) para comunicarse.```

####Clonado de máquinas virtuales y/o posterior configuración
Hasta aquí la configuración de los servidores es común. Ahora se clonan las máquinas virtuales. Hay que cambiar el hostname de las nuevas máquinas, su IP interna y algún que otro cambio menor.

Se debe modificar
/etc/sysconfig/network-scripts/ifcfg-ethx
Añadiendo la IP de cada servidor y poniendo protocolo a none y otros cambios para que funcione la red interna para todos los servidores simultáneamente. Hay que cambiar la MAC en caso de que no lo haya detectado el clonado.

###MDT/MGS
Con la siguiente orden creamos un ZPool de ZFS, configurándolo como mirror y le asignamos funciones de MDT y MGS.  

```mkfs.lustre --mdt --mgs --index=0 --fsname=meta --backfstype=zfs lustre-mgs/mgs /dev/md127 lustre-mdt/mdt /dev/md127```

####Modificamos /etc/ldev.conf
Tenemos que añadir líneas según los componentes de lustre que haya en el servidor local.
El formato es:

hostname  - label zpool

donde hostname es cómo se llama nuestro servidor en la red. Label es fs-MDTxxxx, si es MDT, fs-OSTxxxx, si es un componente OST donde xxxx es el íncice asignado y fs es el nombre que hemos dado a nuestro sistema de archivos, en mi caso lustre.

En este caso quedaría una única línea:
```servidor - lustre-MDT0000 lustre-mdt/mdt```

Activamos el servicio LUSTRE. Si todo funciona bien, nos debería decir como salida que se ha montado correctamente.
service lustre start 

###OSS/OST
Con la siguiente orden creamos un ZPool de ZFS, configurándolo como mirror y le asignamos función de OST.
En la opción --mgsnode hay que decirle la ubicación IP en la red LUSTRE del sistema MGS que estará encargado de gestionarlo.

```mkfs.lustre --ost --index=1 --fsname=lustre --backfstype=zfs --device-size=8388608 --mgsnode=192.168.1.5@tcp  lustre-ost/ost0 /dev/md127```

Igual que antes:
Modificamos /etc/ldev.conf con el mismo formato.
```servidor - lustre-MDT0000 lustre-mdt/mdt```
Activamos el servicio LUSTRE. Si todo funciona bien, nos debería decir como salida que se ha montado correctamente.
service lustre start 

##Bibliografía
http://zfsonlinux.org/

http://warpmech.com/?news=tutorial-getting-started-with-lustre-over-zfs

http://zfsonlinux.org/lustre-configure-single.html
