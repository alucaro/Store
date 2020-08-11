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

![página de inicio](https://github.com/alucaro/Store/upload/master/store/public/images/inicio.PNG?raw=true)

## Modelo de la base de datos

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- [UserInsights](https://userinsights.com)
- [Fragrantica](https://www.fragrantica.com)
- [SOFTonSOFA](https://softonsofa.com/)
- [User10](https://user10.com)
- [Soumettre.fr](https://soumettre.fr/)
- [CodeBrisk](https://codebrisk.com)
- [1Forge](https://1forge.com)
- [TECPRESSO](https://tecpresso.co.jp/)
- [Runtime Converter](http://runtimeconverter.com/)
- [WebL'Agence](https://weblagence.com/)
- [Invoice Ninja](https://www.invoiceninja.com)
- [iMi digital](https://www.imi-digital.de/)
- [Earthlink](https://www.earthlink.ro/)
- [Steadfast Collective](https://steadfastcollective.com/)
- [We Are The Robots Inc.](https://watr.mx/)
- [Understand.io](https://www.understand.io/)
- [Abdel Elrafa](https://abdelelrafa.com)
- [Hyper Host](https://hyper.host)
- [Appoly](https://www.appoly.co.uk)
- [OP.GG](https://op.gg)
- [云软科技](http://www.yunruan.ltd/)

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
