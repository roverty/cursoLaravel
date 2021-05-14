# Creación de grahook(sitio web) día 02

## Objetivos

* Eloquent

<!-- TODO:- Agregar capturas de pantalla o GIFs de lo que se obtendrá en esta sección -->

## Eloquent

* Nos brinda una manera bonita y sencilla de trabajar con nuestras bases de datos. 

<!-- TODO:- Explicar que es un modelo -->

* Algo que deben tener SÚPER CLARO es que para cada tabla existe un modelo dentro de app (casi siempre)
  * Hasta ahorita solo tenemos `User`, que como lo hace laravel pues ya tiene varias cosas dentro, lo normal es que nuestra tabla tenga el nombre del modelo en plural, es como una regla.

### Modificando tabla users

Si nos vamos a Register, unicamente tenemos 3 datos, nombre,email y contraseña.
Vamos a agregar una columna que especifique si el usuario es administrador o no, esto para agregar tareas, calificaciones, etc. 
*¿En qué archivo se hace la modificaciones de las tablas de la BD?*
En las migraciones

Para modificar los datos que tendrá el usuario lo hacemos desde el archivo de migración `/database/migrations/create_users_table`

* Tenemos una columna id que Laravel pone por default en todas las tablas, tenemos una columna que recibe cadenas llamada name, otra email que es única y otra que es por default time stamps que guarda la fecha de creación y modificación del registro.
* La nueva columna de admin podrá tener únicamente dos valores, o es admin o no es admin, así como tenemos datos string, ¿qué tipo de dato le pondrían a está columna?

Para ver todas las opciones vamos a la documentación 
Database>Migrations>Columns

Añadimos las siguientes columnas:
`$table->boolean('admin')->default(false);`

* Por default va a tener ‘0’ que equivale a `false`

Dentro de `User.php`
añadimos `'admin',`

Para cargar los cambios

```sh
php artisan migrate 
```

Pero vemos que muestra un mensaje que dice `Nothing to migrate`, para que funcione tenemos que borrar todas las tablas y hacerlas de nuevo, tenemos la opción de hacer una nueva migración pero mientras lo haremos así:

```sh
php artisan migrate:fresh
```

Revisamos que nuestra tabla esté actualizada.
Hacemos de nueva cuenta nuestro registro y debería funcionar

Regresemos a `app.blade.php`
Tenemos en el dropdown una opción de admin, entonces ya podemos poner la condición siguiendo el esquema de arriba. En el dropdown 
```php
@if(Auth::user()->admin), @endif
```

Actualizamos y como por default tiene cero no nos muestra nada
Para hacerlo admin editamos en phpmyadmin y le ponemos 1

### Integrando vista Register

Cerramos todo y abrimos `register.blade.php` .
Copiamos y pegamos en un archivo en blanco.
De nuestras plantillas copiamos todo el contenido de `register.html`, si actualizamos debería aparecer pero obviamente no va a funcionar. Para empezar el formulario debe llevar una acción
copiamos :

```php
method="POST" action="{{ route('register') }}"
@csrf
```

* Copiamos los inputs completos
* Cada input tiene un name que corresponde al nombre de la columna

### Integrando vista Login

Reemplazamos nuestro formulario en `login.blade.php`. Se queda de tarea :)

### Integrando vista Home

Reemplazamos nuestro código `home.html` en `home.blade.php`

Deberíamos tener login, register y home funcionando