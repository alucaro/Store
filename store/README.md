<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Acerca de Store

Permite a los usuarios seleccionar la cantidad de productos que desee desde la pagina de inicio sin necesidad de registrarse, se selecciono la pasarela de pago de  PlacetoPay para el procesamiento de la transacción usando Web Checkout para que se puedan usar todos los medios de pago con una sola integración.

Visitar el siguiente enlace para mayor informacion:

- [Documentación Web Checkout](https://placetopay.github.io/web-checkout-api-docs).


## Instalacion y uso

Para la instalacion se recomienda descargar el repositorio y copiarlo en la carpera htdocs de su servidor local favorito ( en el caso de Xammp o Mamp), dirigirse a la ruta del archivo y ejecutar el comando: 
```ruby
php artisan serve
```
Asegurese de que Mysql y apache esten ejecutandose.

Si no se presento ningun problema, ejecute los siguientes comandos:

```ruby
php artisan migrate
php artisan db:seed
```

Si se presenta algun error es conveniente que ejecute:
```ruby
php artisan migrate:fresh --seed
```
En su navegador dirija a la ruta de su localhost (http://127.0.0.1:8000), deberia mostrar lo siguiente:

![página de inicio](https://github.com/alucaro/Store/blob/master/store/public/images/inicio.PNG?raw=true)


## TDD

Tambien se incluye el uso de pruebas, estas se encuentran el en directorio test del proyecto, para ejecutarlas usar el comando:

```ruby
./vendor/bin/phpunit
```
Lo cual deberia mostrar una salida como la siguiente:

![pruebas](https://github.com/alucaro/Store/blob/master/store/public/images/pruebas.png?raw=true)


Si desea ejecutar solo una prueba en especial puede hacer uso del comando:
```ruby
./vendor/bin/phpunit --filter [nombre_de_la_prueba]
```

## Modelo de la base de datos

Se adiciona el modelo de base de datos usado para este proyecto:

![modelo base de datos](https://github.com/alucaro/Store/blob/master/store/public/images/db_diagram.jpg?raw=true)


## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
