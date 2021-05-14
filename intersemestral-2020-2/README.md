# Curso Laravel

```shell
Julio de 2020
Author: rhodfra@gmail.com
Laravel 7.* | PHP 7.4 (cli) | Composer version 1.10 | npm 6.14
```

<p align="center">
    <img src="img/cover.jpg" alt=cover>
</p>

Laravel es uno de los frameworks para backend más famosos de los últimos años, aprenderlo es fundamental si se quiere incursionar en el desarrollo web ya que la mayoría de las empresas trabajan con él debido que es un framework que se caracteríza por ser fácil de usar, flexible y tiene una gran cantidad paquetes que nos ayudarán a increíbles sitios web.

## Conocimientos requeridos

- Manejo de paradigma orientado a objetos
- Conocimientos básicos de html, css y js
- Conocimientos básicos de base de datos
- Conocimientos básicos de php

## Temario

0. **Repaso de php**

   - Características de php
   - Sintaxis básica
   - Variables y tipos de variables
   - Operadores
   - Estructuras de control
   - Arreglos
   - Funciones
   - Paradigma orientado a objetos
     - Clases y obtjos
     - Métodos y atributos
     - Constructores
     - Herencia

1. **Conceptos fundamentales**

   - ¿Qué es laravel?
   - Diferencia entre biblioteca, API y framework
   - Frameworks similares a laravel
   - Artiquectura cliente servidor (C/S)
   - Protocolo Http
     - Métodos de petición
       - Get
       - Post
     - Códigos de Respuesta
   - Certificado SSL
   - Servidores web (Xampp, NGINX)
   - Patrones de diseño (MVC, MVP, Singleton, Provider)
   - NodeJS
   
2. **Configuración del entorno de trabajo**

   - Dependencias requeridas
   - Instalación
     - Instalación el MacOS
     - Instalación en Windows
     - Instalación en GNU/Linux

3. **Estructura del un proyecto en laravel**

   - Creación y configuración de un proyecto en laravel
   - Artisan
   - Comandos importantes de laravel
   - REPL tinker
   - Directorios importantes de un proyecto en laravel
   - Archivos importantes de un proyecto en laravel

4. **Modelo de datos en Laravel**

   - Modelo Relacional

   - ¿Qué es un ORM?
   - ORM Eloquent
   - Configuración de la BD
   - Modelos
   - Migracciones y DDL
   - Relaciones
   - DML y DQL
     - DQL con Eloquent
     - DQL con Query Builder

6. **Sistema de autentificación**

6. **Rutas**

   - Listar rutas
   - Tipos de rutas
   - Métodos de la clase route
   - Rutas con parámetros
     - Parámetros opcionales
     - Parámetros restringidos por REGEX
   - Rutas con nombre
   - Grupos de rutas y prefijos
   - Rutas con middleware

7. **Controladores**

   - Creación de controladores
   - Tipos de controladores
     - Controladores de recursos

8. **Rutas, contoladores y middleware**

   - Rutas y retorno de vistas
   - Rutas para controladores de recursos
   - Middleware
   - Middleware frecuentes en laravel

9. **Vistas**

10. **Manejo de formularios**

## Recomendaciones
Este repositorio tiene la siguiente estructura:

```bash
.
├── img
│   └── cover.jpg
├── README.md
└── temas
    ├── 01-lunes
    │   ├── README.md
    │   └── recursos
    ├── 02-martes
    │   ├── README.md
    │   └── recursos
    ├── 03-miercoles
    │   ├── README.md
    │   └── recursos
    ├── 04-jueves
    │   ├── README.md
    │   └── recursos
    └── 05-viernes
        ├── README.md
        └── recursos
```

* De manera que el `README.md` del lunes contiene la información desglosada de lo que se verá el lunes y así con los demás días.
* En cada carpeta debe haber una con el nombre de `recurso`  si es que hay recursos que proporcionarle al asistente.