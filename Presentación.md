#LUSTRE
####Carlos Paradela Pérez
##¿Qué es LUSTRE?
Lustre es un sistema de archivos distribuido, que está pensado para servir grandes volúmenes de datos a gran cantidad de clientes.

El sistema de archivos LUSTRE permite a los usuarios escribir en un mismo archivo simultáneamente, así como utilizar archivos de distintas localidades de forma eficiente.

Todo esto de forma transparente al usuario.

Estas características hacen que sean muy utilizados en supercomputadores (muchísimos discos pretenderían parecer un único sistema de archivos, lo cual es parte de la magia de LUSTRE) y en sistemas muy distribuidos como por ejemplo compañías meteorológicas.

##¿De qué se compone LUSTRE?

Las componentes del sistema LUSTRE se distribuyen para evitar los cuellos de botella.

###MDS
Un MetaData Server es el encargado de gestionar los metadatos de los archivos, es decir: los permisos, la ubicación, las propiedades, etc.

Se componen de MGS (ManaGemet Server) y MDT (MetaData Target).
El MDS gestiona un punto de acceso al cliente. Es el que se encarga de recibir la petición del cliente y procesarla.
El MDT es el encargado de guardar los metadatos propiamente dichos para ponerlos a disposición del MDS.

##OSS
Un Object Storage Server es el encargado de almacenar los archivos. Actúan bajo demanda del MDS asociado y sirven en corresponencia sin tener que preocuparse de nada sobre cosas como los permisos, buscar el archivo, etc.

Se compone de OSS y OST.
El OSS recibe la petición del MGS y la transforma en una petición a uno de sus OST (puede haber varios OST asociados a un único OSS)

