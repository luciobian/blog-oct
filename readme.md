# Blog Demo

Este es un blog de demostración desarrollado en Laravel 5.8.

Pemite autenticarse, visualizar, alta, eliminar y modificar artículos.

### Instalación 

Se requiere:
```
>PHP 7.1
>Composer
>Mysql 
```
Descargar archivo para clonar repositorio 

[install.sh](https://gist.github.com/luciobian/982d344ec1f93f97b040ec7c649b7228/archive/c03b0ff186068c5cdfe04efbb94dab23537844bd.zip)

Luego de descargar descomprimir en la donde va a clonar el proyecto y ejecutar.

```
$ cd <project folder>
$ ./install.sh
```
Iniciar el servicio Mysql y configurar archivo .env con los información de la base de datos.
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=blog
DB_USERNAME=root
DB_PASSWORD=
```
Crear una base de datos con el nombre ingresado en el archivo .env

Ejecutar migraciones:
```
$ cd <project folder>
$ php artisan migrate
```    
Para agregar datos de prueba, descargar y ejecutar como en el paso de instalación:
[data.sh](https://gist.github.com/luciobian/dc0c23106687ad260bd3693ed0b0a522/archive/6125f98c97e6c4713dfd5a3b51cb5f88e21c1a6e.zip)

### Ejecutar test
```
$ cd <project folder>
$ vendor/bin/phpunit
```
