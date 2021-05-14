# Creación de grahook(sitio web) día 03

## Objetivos

* Middleware
* Crear modelo Tarea, controllador y rutas correspondientes

## Middleware 

* Proveen un mecanismo de filtrado de requests, por ejemplo el que tenemos en HomeController, en donde únicamente usuarios autenticados puede acceder a esa ruta.

* El primer paso es crear el Middelware desde la terminal, en este caso será un Middleware que filtre a los usuarios que son administradores. 

Escribimos el comando en la terminal:

```sh
php artisan make:middleware Admin
```
abrimos nuestro archivo y escribimos la condicional 

```php
if(!auth()->check()){
  return redirect('/login');
}
if(!auth()->user()->admin){
return redirect('/login');
}
```
Hacemos su ruta respectiva (se puede copiar de la documentación) 
`The Basics>Middleware->Groups`

```php
Route::middleware(['admin'])->group(function () {});
```
Hacemos vista’ de prueba:

```php
Route::get('admin',function(){
	return 5;
)};
```
Al probarlo obtenemos error de que admin no existe, es porque le tenemos que dar un alias dentro del archivo: `app/Http/Kernel.php`

```php
'admin'=>\App\Http\Middleware\Admin::class
```
Y ya debería funcionar. 

## Vista layout para administradores 

Duplicamos app.blade `/layouts/admin.blade.php` y en el contenido del header pegamos nuestro nuevo código, para el logout pegamos el de `app.blade` y el nombre del usuario en vez de ‘Dropdown’

En vista normal ponemos ruta `href="{{ url('/') }}"`
Para verificar cambiamos ruta

```php
Route::get('admin',function(){
   	return view('layouts.admin');
});
```
## Hacer modelo Tarea

Una de las cosas más importantes de la página son las tareas y funcionarán de la siguiente manera: un usuario admin agrega una tarea para que a ustedes les aparezca en su página de inicio y así posteriormente ustedes puedan entregarla.
Tengamos en mente 3 pasos:
Crear Modelo, Crear Controlador y Migración. 

Los tres los podemos hacer desde la terminal
* Crear modelo Tarea
```sh
php artisan make:model Tarea
```

* Hacer controlador
La r es una bandera para crear un tipo especial de controlador llamado controlador de recursos

```sh
php artisan make:controller TareaController -r
```
Hacemos migración, en donde definiremos la estructura de nuestra base de datos

```sh
php artisan make:migration create_tareas_table
```
### Definiendo tabla de Tareas

Empezamos con los datos que quisiéramos tener de cada tarea (lo recomendable es siempre poner los nombres de nuestras columnas en inglés). Vemos que por default está el id y el timestamps que tiene la fecha de creación/modificación. 

En nuestro archivo de migration agregamos cada campo

Título que sería string:
```php
$table->string('title');
```
Para texto tenemos 3 opciones, son textos muy cortos entonces usaremos text.
```php
$table->text('description');
```
Y para la fecha: 
```php
$table->date('date');
$table->time('time');
```
Para los archivos: 
```php
$table->string('filetype');
$table->string('file')->nullable();
```
<!-- Explicar los modificadores -->

Lo  string porque en realidad lo que vamos a guardar es el nombre del archivo para después hacer referencia a él.

Ya que tenemos todo lo necesario haremos la migración
```sh
php artisan migrate
```
y podemos checar que la tabla esté completa

## Controlador de recursos

Este controlador tiene varias funciones ya hechas que tal vez les sean conocidas.
Son como el CRUD en las bases de datos, (create, read, update, delete), son operaciones fundamentales que nosotros podemos hacer con nuestra tabla y que laravel ya nos da listas para usar.
A este tipo de controlador se le llama resource, y así es como lo vamos a especificar en nuestra ruta. Vamos al archivo `web.php` y borramos la que hicimos de ejemplo. 

```php
Route::resource('admintareas', 'TareaController');
```
Aquí se agrupan las 6 rutas del controlador de recursos. 

### Vista index

Hacemos nueva carpeta `resources/views/admin/tareas` y creamos nuestra vista
`tareas/index.blade.php`
Es recomendable tener una carpeta para cada tabla y ponerle el nombre de la función a esa vista.

Heredamos nuestra plantilla
```php
@extends('layouts.admin')
@section('content')
@endsection
```
Y pegamos código de `tareas-index.html`

Dentro de la función `TareaController@index` regresamos la vista que acabamos de hacer

```php
return view('admin.tareas.index');
```

Ahora vamos a modificar nuestras rutas en la navbar

Dentro de: `/layouts/admin.blade.php`

```php
href="{{ route('admintareas.index') }}
```

Y para que esta sea la primera vista que vean los administradores, dentro del archivo `/layouts/app.blade.php`

```php
href="{{ route('admintareas.index') }}
```

### Agregar tareas

Creamos vista `tareas/create.blade.php`

Lo primero es heredar nuestra navbar que ya tenemos hecha y que está en `layouts/admin.blade.php`

```php
@extends('layouts.admin')
@section('content')
@endsection
```
Y pegamos nuestro código dentro de la sección 'content'

En el controlador `TareaController@create`

```php
return view('admin.tareas.create')
```

En index poner la ruta del botón 

```php
href="{{ route('admintareas.create') }};
```

La función create es únicamente para mostrar la vista del formulario, pero para guardarlo tenemos la función store que recibe un argumento. 
Cuando llenemos nuestro formulario y demos click en el botón de guardar vamos a llamar a esta función que va a guardar todos los datos en nuestra tabla

<!--Aqui explicaríamos los formularios-->
Dentro del formulario ponemos `method="POST"`

Cuando un usuario rellena un formulario en una página web los datos hay que enviarlos de alguna manera, tenemos dos opciones: POST y GET
* Get: envía los datos mediante el URL y get no permite el envío de archivos
* Post: los envía en 2o plano de manera que no podemos verlos
Para enviar cosas complejas más allá de puro texto por método POST hay que especificarlo, por defecto envía solo texto
To encode
```php
enctype="multipart/form-data"
```
Y por último la acción, que es lo que se ejecuta al dar click en el botón submit
```php
action="{{ route('admintareas.store') }}
```
La siguiente linea sirve para prevenir ataques de tipo csrf

```php
@csrf
```

Ya le dijimos que función ejecutar pero todavía la tenemos vacía, hay que especificar qué datos va a guardar y en dónde.





