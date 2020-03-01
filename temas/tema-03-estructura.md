# Curso laravel

## Creación y configuración de un proyecto en laravel

Para crear un proyecto de laravel utilizaremos las herramientas instaladas previamiente, en caso de no tenerlas instaladas revisar la sección correspondiente.

Con tan solo el siguiente comando crearemos un proyecto de laravel con todas sus dependencias de php, más no las de javascript.

```shell
laravel new <Nombre-Proyecto>
```

Este comando puede tardar un par de momentos debido a la cantidad de paquetes que esta descargando.

### Estructura de un proyecto en laravel

Al terminar la descarga podremos observar la siguiente estructura de carpetas y archivos de laravel.

```shell
.
├── app
│   ├── Console
│   │   └── Kernel.php
│   ├── Exceptions
│   │   └── Handler.php
│   ├── Http
│   │   ├── Controllers
│   │   ├── Kernel.php
│   │   └── Middleware
│   ├── Providers
│   └── User.php
├── artisan
├── bootstrap
│   ├── app.php
│   └── cache
│       ├── .gitignore
│       ├── packages.php
│       └── services.php
├── composer.json
├── composer.lock
├── config
│   ├── app.php
│   ├── auth.php
│   ├── broadcasting.php
│   ├── cache.php
│   ├── database.php
│   ├── filesystems.php
│   ├── hashing.php
│   ├── logging.php
│   ├── mail.php
│   ├── queue.php
│   ├── services.php
│   ├── session.php
│   └── view.php
├── database
│   ├── factories
│   │   └── UserFactory.php
│   ├── .gitignore
│   ├── migrations
│   │   ├── 2014_10_12_000000_create_users_table.php
│   │   ├── 2014_10_12_100000_create_password_resets_table.php
│   │   └── 2019_08_19_000000_create_failed_jobs_table.php
│   └── seeds
│       └── DatabaseSeeder.php
├── .editorconfig
├── .env
├── .env.example
├── .gitattributes
├── .gitignore
├── package.json
├── package-lock.json
├── phpunit.xml
├── public
│   ├── favicon.ico
│   ├── .htaccess
│   ├── index.php
│   └── robots.txt
├── README.md
├── resources
│   ├── js
│   │   ├── app.js
│   │   └── bootstrap.js
│   ├── lang
│   │   └── en
│   ├── sass
│   │   └── app.scss
│   └── views
│       └── welcome.blade.php
├── routes
│   ├── api.php
│   ├── channels.php
│   ├── console.php
│   └── web.php
├── server.php
├── storage
│   ├── app
│   │   ├── .gitignore
│   │   └── public
│   ├── framework
│   │   ├── cache
│   │   ├── .gitignore
│   │   ├── sessions
│   │   ├── testing
│   │   └── views
│   └── logs
│       └── .gitignore
├── .styleci.yml
├── tests
│   ├── CreatesApplication.php
│   ├── Feature
│   │   └── ExampleTest.php
│   ├── TestCase.php
│   └── Unit
│       └── ExampleTest.php
└── webpack.mix.js
    # Algunos de los archivo y/o carpetas fueron descartados por simplicidad
```

A continuación se explica el uso de los **directorios** más importantes de *laravel* 

- `MyBlog/app`: En este directorio se guardan subdirectorios importantes que almacenan *controladores* y *providers* 

- `MyBlog/app/Http/Controllers` :  Aquí se almacenan los controladores, que como se verá más adelante son archivos donde se guarda la lógica de nuestro sitio.

- `MyBlog/app/Models`: Esta carpeta NO existe por default pero se recomienda crearla para guardar aquí nuestros modelos, que son los que nos definen la estructura de nuestros datos como se verá más adelante.

- `MyBlog/config`: En esta carpeta existen varios archivo que nos permiten configurar bastantes cosas interesantes, sobre todo acerca de  los `middlewares` y `providers`, también se pueden configurar ciertos cosas de la *conexión* a la base de datos pero dicha configuración se recomienda hacer en el archivo `.env`

- `MyBlog/database/migrations`: En este directorio se encuentras los esquemas que definen como y con que atributos se va a crear una entidad en la base de datos.

- `MyBlog/database/seeds`: En esta carpeta se encuentrar todas las clases relacionadas con poblar la base de datos con datos prueba.

- `MyBlog/public`: En esta carpeta deben de ir los archivos css, js e imágenes de nuestra aplicación. Cuando un cliente haga una petición de tipo get para mostrar el contenido de alguna página solo tendrá acceso a los archivos que se encuentren en esta carpeta.

  Un error de principiante es confundirse y poner los archivos css o js en la carpeta resourses

- `MyBlog/resources`:  Los más destacable que alberga esta carpeta es la carpeta `views` que es donde se guardan las vista que se le muestran al usuario.

- `MyBlog/vendor`: Esta carpeta alberga todas las librerías o dependencias que hacen que laravel funcione.  A pesar de es posible modificar el código de las librerías que se encuentran aquí dentro no se debe hacer ya que se considera una **Pésima** práctica de programación. Si se modifican los archivos el proyecto pierde portabilidad.

- `MyBlog/node_modules`: Esta carpeta de momento no se encuentra en la estructura de directorios y eso se debe a que no se han instalado las dependencia de js para hacerlo basta con ejecutar.

  ```shell
  npm install && npm run dev
  ```

Ahora, se explica el uso de los **archivos** más importantes de *laravel* 

<!-- Antes de proseguir se recomienda iniciar un repositorio de git y hacer commit. -->

- `MyBlog/composer.json`: Este archivo guarda un registro de las dependencias (y sus versiones) de php que se van instalando. Además guarda una referencia a los scripts que tiene que ejecutar en caso del que es la primera vez que se esta ejecutando el comando `composer install`. El contenido del archivo al tener un proyecto nuevo es 

  ```jso
  {
      "name": "laravel/laravel",
      "type": "project",
      "description": "The Laravel Framework.",
      "keywords": [
          "framework",
          "laravel"
      ],
      "license": "MIT",
      "require": {
          "php": "^7.2",
          "fideloper/proxy": "^4.0",
          "laravel/framework": "^6.2",
          "laravel/tinker": "^2.0"
      },
      "require-dev": {
          "facade/ignition": "^1.4",
          "fzaninotto/faker": "^1.4",
          "mockery/mockery": "^1.0",
          "nunomaduro/collision": "^3.0",
          "phpunit/phpunit": "^8.0"
      },
      "config": {
          "optimize-autoloader": true,
          "preferred-install": "dist",
          "sort-packages": true
      },
      "extra": {
          "laravel": {
              "dont-discover": []
          }
      },
      "autoload": {
          "psr-4": {
              "App\\": "app/"
          },
          "classmap": [
              "database/seeds",
              "database/factories"
          ]
      },
      "autoload-dev": {
          "psr-4": {
              "Tests\\": "tests/"
          }
      },
      "minimum-stability": "dev",
      "prefer-stable": true,
      "scripts": {
          "post-autoload-dump": [
              "Illuminate\\Foundation\\ComposerScripts::postAutoloadDump",
              "@php artisan package:discover --ansi"
          ],
          "post-root-package-install": [
              "@php -r \"file_exists('.env') || copy('.env.example', '.env');\""
          ],
          "post-create-project-cmd": [
              "@php artisan key:generate --ansi"
          ]
      }
  }
  ```

  <!-- Hablar de la función "discovered"-->

  Para pobrar que lo anterior instalaremos un paquete **esencial** para cualquier proyecto en laravel.

  ```shell
  composer install laravel/ui
  ```

  Una vez que se halla terminado de instalar verificar que el archivo json ha cambiado.

- `MyBlog/config/app.php`: Se encuentra las configuraciones de la zona horaria, la región la lista de *providers* de la aplicación y algunos *alias*' 

- `MyBlog/config/auth.php`: En este archivo se encuentra definida la manera en que los guards y providers interacturarán para autentificar usuarios.

- `MyBlog/package.json`: Este archivo es analogo a `composer.js` solo que este lleva registro de los scripts o dependencias de javascript.

  ```json
  {
      "private": true,
      "scripts": {
          "dev": "npm run development",
          "development": "cross-env NODE_ENV=development node_modules/webpack/bin/webpack.js --progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js",
          "watch": "npm run development -- --watch",
          "watch-poll": "npm run watch -- --watch-poll",
          "hot": "cross-env NODE_ENV=development node_modules/webpack-dev-server/bin/webpack-dev-server.js --inline --hot --config=node_modules/laravel-mix/setup/webpack.config.js",
          "prod": "npm run production",
          "production": "cross-env NODE_ENV=production node_modules/webpack/bin/webpack.js --no-progress --hide-modules --config=node_modules/laravel-mix/setup/webpack.config.js"
      },
      "devDependencies": {
          "axios": "^0.19",
          "cross-env": "^5.1",
          "laravel-mix": "^4.0.7",
          "lodash": "^4.17.13",
          "resolve-url-loader": "^2.3.1",
          "sass": "^1.15.2",
          "sass-loader": "^7.1.0"
      }
  }
  ```

  Se actualiza cada que al proyecto se le instala una nueva dependencia de javascript.

- `MyBlog/public/index.php`: Es el análogo al punto de entrada en los lenguajes de programación (*la función main()*), todas la peticiones se reciben en este archivo y posteriormente se manda el recurso adecuado. No hay ningún otro archivo php que el usuario pueda consultar sin antes pasar por `index.php`, esto por motivos de seguridad.

- `MyBlog/public/.htaccess`: Los archivos `.htaccess` son muy famosos a la hora de levantar servidores web. Se encargan  de listar los archivos a los que el cliente tendrá acceso.

- `MyBlog/resources/js/app.js`: Es archivo solo se encarga de llamar a `MyBlog/resources/js/bootstrap.js`, sencillamente por convención siempre se espera un `app.js` como archivo *entry point*.

- `MyBlog/resources/js/bootstrap.js`:  En este archivo se dan de alta las dependencias de javascript que vayan a ser compiladas por npm, una vez compiladas aparecerán en la carpeta `public/js`.

- `MyBlog/routes/web.php`: Se definen las rutas de tipo POST, GET, PUT, etc. al que los distintos tipos de usuario tendrán acceso vía web.

- `MyBlog/routes/api.php`: Se definen las rutas de tipo POST, GET, PUT, etc. al que los distintos tipos de usuario tendrán acceso vía API REST, la autentificación se suele realizar mediante un token.

- `MyBlog/webpack.mix.js`: Es un sistema que podemos instalar dentro de nuestro proyecto Laravel  para definir el paso a paso de compilación mediante un método de encadenamiento, es decir, hacer una lista de todos tus archivos  javascript, css, archivos sass o archivos less para que con webpack  poder agruparlos y compilarlos paso a paso.

  Este archivo es el *punto de entrada* para el comando `npm run dev` o sus variantes, para más información revisar https://laravel.com/docs/6.x/mix

- `MyBlog/.env.example`: Es un archivo de "resplado" de `.env` 

- `MyBlog/.env`: En este archivo se realizan configuración *sensibles* por lo cual nunca debe ser compartido. En el se escriben las credenciales de base de datos, las credenciales de email para usar las funciones de enviar correo para restablecimiento de la contraseña, entre otras.

  Su estructura es la siguiente:

  ```shell
  APP_NAME=Laravel
  APP_ENV=local
  APP_KEY=base64:ZKp1ISqd8bLdX2VJfXRSw2hMwnYHvhxNexsUKXIwx5w=
  APP_DEBUG=true
  APP_URL=http://localhost
  
  LOG_CHANNEL=stack
  
  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=laravel
  DB_USERNAME=root
  DB_PASSWORD=
  
  BROADCAST_DRIVER=log
  CACHE_DRIVER=file
  QUEUE_CONNECTION=sync
  SESSION_DRIVER=cookie
  SESSION_LIFETIME=120
  
  REDIS_HOST=127.0.0.1
  REDIS_PASSWORD=null
  REDIS_PORT=6379
  
  MAIL_DRIVER=smtp
  MAIL_HOST=smtp.mailtrap.io
  MAIL_PORT=2525
  MAIL_USERNAME=null
  MAIL_PASSWORD=null
  MAIL_ENCRYPTION=null
  MAIL_FROM_ADDRESS=null
  MAIL_FROM_NAME="${APP_NAME}"
  
  AWS_ACCESS_KEY_ID=
  AWS_SECRET_ACCESS_KEY=
  AWS_DEFAULT_REGION=us-east-1
  AWS_BUCKET=
  
  PUSHER_APP_ID=
  PUSHER_APP_KEY=
  PUSHER_APP_SECRET=
  PUSHER_APP_CLUSTER=mt1
  
  MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
  MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
  ```

- `MyBlog/.gitignore`: Al trabajar con git hay muchos archivos que se debe ignorar, de no hacerlo el control de versiones se verá afectado. Además también se deben ignorar archivos *sensibles* como el caso de `.env`.

  `.gitignore` es una lista de archivos o directorios que no se versionarán. Puede haber un archivo gitignore por cada directorio de ser necesario.

  ```shell
  # Buscando todos los .gitignore que crea laravel
  
  [rodrigo@pc-rfp MyBlog]$ find . -name .gitignore
  ./bootstrap/cache/.gitignore
  ./storage/framework/testing/.gitignore
  ./storage/framework/.gitignore
  ./storage/framework/views/.gitignore
  ./storage/framework/sessions/.gitignore
  ./storage/framework/cache/data/.gitignore
  ./storage/framework/cache/.gitignore
  ./storage/logs/.gitignore
  ./storage/app/.gitignore
  ./storage/app/public/.gitignore
  ./.gitignore
  ./database/.gitignore
  ```

Es imposible describir todos los directorios y se listaron solo los más utilizados, se recomienda memorizarlos para tener una mayor soltura a la hora de programar en ellos. 

La siguiente liga tiene la explicación de los directorios directamente de la documentación de laravel https://laravel.com/docs/6.x/structure#the-public-directory

### Herramientas un proyecto en laravel

Al crear un proyecto en laravel tendremos acceso una la interfaza de comandos llamada `artisan`.

`artisan`: Es la interfaz de línea de comandos de laravel que nos permite realizar tareas como: generar migraciones, crear controladores, publicar nuevos paquetes. Desarrolladores más experimientados suelen crear sus propios comandos de artisan y laravel provee un forma sencilla de hacerlo.

Los comandos más comunes de laravel son:

```shell
php artisan # Lista los comandos disponibles
php artisan list # Lista los comandos disponibles
php artisan serve # Inicia el servidor para poder ver el sitio en el navegador
php artisan tinker  # Abre una shell para interactuar con la aplicación
php artisan make:controller <Nombre-Controller> # Crea un archivo "controller"
php artisan make:model <Nombre-Modelo> # Crea un archivo "model"
php artisan make:seeder <Nombre-Seeder> # Crea un archivo "seeder"
php artisan make:request <Nombre-Request> # Crea un archivo "request"

php artisan migrate # Corre las migraciones a la BD
php artisan migrate:fresh   # Elimina todas las tabla y corre las migraciones de nuevo

# Un poco menos importantes (o menos utilizados) pero igualmente útiles
php artisan route:list # Lista las rutas y su información
php artisan storage:link # Es útil a la hora de trabajar con imágenes.
php aristan vendor:publish # Es útil cuando se trabajan con los paquetes de vendor/
```

El comando **serve** es solo un acceso directo para el servidor web incorporado de PHP, algo que PHP tiene listo para usar, por lo que el punto de usarlo es comenzar a probar su aplicación lo más rápido que pueda.

**Laravel Tinker** es un REPL poderoso para el framework Laravel, impulsado por el paquete PsySH. 

REPL viene de Read—Eval—Print—Loop algo así como Leer — Evaluar — Imprimir — Bucle, este tipo de sistemas simplemente toma las entradas del usuario, las evalua y regresa los resultados del usuario.

Easter-egg : `php artisan inspire`

Para más información se recomienda la documentación de laravel https://laravel.com/docs/6.x/artisan

### Resumen para la creación de un proyecto

```shell
laravel new MyBlog
composer install
composer require laravel/ui
php artisan ui vue --auth # <!-- Checar este comando -->
npm install && npm run dev
```

**¡Eso no es todo!**

Para que los formularios funcionen correctamente se necesita generar una llave única del proyecto.

```shell
php artisan key:generate
```

**Ahora solo resta conectarse a una base de datos**, de los cual se hablará más adelante, pero si quieres explorar todo lo que ofrece laravel al haber tirado 5 comandos, podemos hacer la prueba con `sqlite`

```shell
touch database/database.sqlte # Crea un archivo vacío
```

Configura el archivo `.env`. para ello borrarremos lo siguiente 

```shell
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```

Y solo nos quedaremos con `DB_CONNECTION`, el cual tendrá el siguiente valor `DB_CONNECTION=sqlite`.

Por último debemos iniciar el servidor, para lo cual podemos tirar el siguiente comando.

```
php artisan serve
```