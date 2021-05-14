# Curso Laravel 2020-1

```shell
Enero de 2019
Author: rhodfra.proteco@gmail.com
Laravel 6.* | PHP 7.4.0 (cli) | Composer version 1.9.1 | npm 6.12.1
```
Laravel es uno de los frameworks para backend más famosos de los últimos años, aprenderlo es fundamental si se quiere incursionar en el desarrollo web ya que la mayoría de las empresas trabajan con él debido que es un framework que se caracteríza por ser fácil de usar, flexible y tiene una gran cantidad paquetes que nos ayudarán a increíbles sitios web.

En ésta primera entrega se pretende que se conozca lo básico del funcionamiento de dicho framework en su versión más actual a la fecha (Laravel 6, 2019).  A pesar de su importancia, en la primera fase de este curso no se tocan temas como *peticiones asincronas* o creación de SPA (Single page applications) con Vue.js, React.js o Angular.js.

## Temario

0. [Repaso de php](temas/tema-00-repaso-php.md)
1. [Configuración del entorno de trabajo](temas/tema-01-entorno.md)
   1. ¿Qué es composer?
   2. ¿Qué son nodejs y npm?
2. [Conceptos fundamentales](temas/tema-02-conceptos.md)
   1. Modelo vista controlador (MVC)
   2. Arquitectura cliente servidor
   3. Protocolo HTTP y HTTPS
      1. Códigos de respuesta de HTTP
      2. Métodos GET y POST
3. [Creación de un proyecto en laravel](temas/tema-03-estructura.md)
   1. Estructura de un proyecto en laravel
   2. Herramientas de un proyecto en laravel
      1. Artisan
      2. Tinker
      3. Valet, Passport, Homestad [Solo informativo]
4. [Rutas de laravel (Laravel routes )](temas/tema-04-rutas.md)
5. [Controladores](temas/tema-05-controladores.md) 
6. Vistas en laravel
   1. Blade Template System
   2. Integración con Vue [Solo informativo]
7. Manejo de formularios
       1. Validación de formularios
       2. Mensajes personalizados
       3. redirect(), back()
8. Eloquent ORM y manejo de modelos en laravel
   1. ¿Qué es un ORM?
   2. Modelos y migraciones
   3. Consultas por medio de relaciones Eloquent
   4. Collecciones
   5. Seeders
9. Query Builder y la clase DB
10. Sistema de autentificación
    1. Confirmación vía email
    2. Restablecimiento de contraseña vía email
    3. Autentificación multiusuario [Solo informativo]
    4. Middleware, Guards y Protected [Solo informativo]

## Empecemos

Los primero que debemos hacer es instalar las herramientas para utilizar laravel para ello se dejan los links de la guía de instalación que depende de sus sistema operativo.

* [Guía de instalación en Windows (usando laragon)](manuales/instalacion-windows.md)
* [Guía de instalación en MacOS](manuales/instalacion-macos.md)
* [Guía de instalación en GNU/Linux (Ubuntu)](manuales/instalacion-linux-ubuntu.md)
* [Guía de instalación GNU/Linux (ArchLinux)](manuales/instalacion-arch.md)

Cualquier duda o comentario, puede ser al correo

* rhodfra.proteco@gmail.com

## Proyecto

Para acreditar el curso es necesario realizar el siguiente proyecto : [Coplix](PROYECTO.md)

El proyecto se puede entregar por cualquier medio

Se recomienda subir a Github

## Contributing 

La forma de contribuir se explica en [CONTRIBUTING](CONTRIBUTING).
