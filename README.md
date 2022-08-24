# sidetours
POR FAVOR LEER ANTES DE USAR

Para instalar el proyecto es importante saber que se ha desarrollado con:
PHP 7.4.14 (si usted usa una versión más antigua puede haber incompatibilidades)
10.4.17-MariaDB 
Y la base de datos utiliza el motor InnoDB con cotejamiento utf8mb4_general_c

El proyecto se divide en 5 archivos:
index.html
  Es la interfaz gráfica para ejecutar el back
  
post.php
  Es el archivo contra el que ataca index.html con posts y este se encarga de procesar las peticiones y hacerlas contra backend.php
  
backend.php
  Este archivo se encarga de atacar contra la base de datos a partir de los parámetros que le han sido previamente facilitados por post.php
  
config.ini
  Contiene la información de conexión con la base de datos, backend.php se alimenta de este para poder realizar las peticiones contra la base de datos.
  
sidetours.sql (contenido dentro de la carpeta dump)
  Este archivo es un dump de la base de datos.
  Tenga en cuenta que antes de importar la base de datos debe de crear una base de datos y luego volcar el sql ya que este sql no le crea la base de datos, solo la rellena.
  Es importante si crea un usuario para este ejercicio que se asegure de dar permisos sobre la base de datos y si no coincide con la configuración de config.ini que lo edite.
  
