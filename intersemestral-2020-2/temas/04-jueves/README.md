# Creación de grahook(sitio web) día 04

## Objetivos

- Controlador de recursos
- Crear tabla de entregas

## Controlador de recursos

### Función store

Dentro de `TareaController@store` lo primero es crear una nueva variable y le asignamos un nuevo objeto Tarea.

```php
$tarea=new Tarea();
```

Cada que usemos un modelo es necesario importarlo porque no están en la misma carpeta

```php
use App\Tarea;
```

Ya tenemos nuestra nueva fila lista para ser llenada, cada columna se podría ver como un atributo. Cuando nosotros hacemos un objeto, automaticamente tiene los atributos que le dimos, vamos a acceder a ellos.
Accedemos a los inputs por medio de su atributo "name"

```php
$tarea->title=request($key='title');
$tarea->description=request($key = 'description');
```

En el `$key` ponemos el nombre de nuestro input para que sepa de donde agarrar la información

```php
$tarea->date=request($key = 'date');
$tarea->time=request($key = 'time');
$tarea->filetype=request($key = 'filetype');
```

El archivo no lo podemos guardar así directamente, recuerden que lo guardamos tipo string.
*Hacemos variable file
*Hacemos una variable file que va a guardar el archivo

```php
$file=request($key='file');
```

\*Hacemos variable con el nombre que se va a guardar

```php
$name=$file->getClientOriginalName();
```

\*Le decimos en donde queremos que se guarde, para esto haremos una carpeta exclusiva
`public/tareas`

\*Guardamos la ruta en una variable destination

```php
$destination = public_path() . '/tareas/';
```

\*Movemos el archivo tal cual que está guardado en la variable file, la función move recibe como primer parámetro el destino y como segundo el nombre.
Movemos el archivo a nuestra ruta destination bajo el nombre name

```php
$file->move($destination, $name);
```

\*Ya que lo movemos podemos ahora si guardar lo que nos interesa en la BD, como es un string, guardamos la cadena del nombre

```php
$tarea->file=$name;
```

Por último guardamos todos los cambios

```php
$tarea->save();
```

\*Regresamos al usuario a la vista principal

```php
return redirect('admintareas');
```

Probamos registrando una con todo y archivo y revisamos que se quede guardada en BD y que el archivo efectivamente esté guardado

¿Qué pasa si no subimos archivo?
Nosotros lo pusimos opcional pero en el controlador estamos diciendo que sí hay entonces hay que poner una condición

```php
if($request->hasFile('file')){
@end if
```

desde `$file hasta $tarea->file`

### Función index

Ya que tenemos guardadas nuestras tareas en la base de datos lo que sigue sería mostrarlas en la página index.

Para que nosotros podamos mostar datos de una tabla en nuestra vista, esos datos se tienen que pasar desde el controlador.En este caso vamos a ponerlos todos dentro de una variable dentro de `TareaController@index`

```php
$tareas = Tarea::all();
```

Ya que los guardamos, los tenemos que pasar a la vista
El primer parametro es la ruta de la vista y el segundo todas las variables que queremos pasar

```php
return view('admin.tareas.index',['tareas'=>$tareas]);
```

Lo único que faltaria sería mostrar los datos dentro de la vista con ayuda de Blade.
Al momento nosotros tenemos solo una tarjeta, pero son varias tareas entonces vamos a mostrar esa misma tarjeta varias veces con datos diferentes.
Esto lo haremos con un ciclo for each dentro del archivo `tareas/index.blade.php`

```php
@foreach($tareas as $tarea)
```

Revisamos y debería mostrar tantas tarjetas como tareas hayamos registrado
Y vamos a ir imprimiendo las variables una por una donde corresponda
¿Cómo se ponen las variables en blade?
Entre llaves hacemos referencia a la columna de nuestra tarea

```php
{{ $tarea->title }}
```

Así de fácil y así con cada una
Para el archivo es un poco diferente:

```php
<a target="_blank" href="{{ asset("tareas/$tarea->file") }}">{{ $tarea->file }}</a>
```

### Mostrar tareas a los usuarios no admin

Dentro de `HomeController@index`

```php
$tareas = Tarea::all();
return view('home',['tareas'=>$tareas]);
```

En index

```php
@foreach($tareas as $tarea)
<a target="_blank" href="{{ asset("tareas/$tarea->file") }}">{{ $tarea->file }}</a>
```

Revisar que en admin.blade.php Vista normal tenga url(‘/’)

<!-- A partir de aqui podría ser en video o bien dejarselos de tarea -->

### Editar tareas

Está funcion edit nos va a regresar una vista con el mismo formulario que en agregar

En `tareas/edit.blade.php` pegamos el mismo código que en `tareas-create.html` y hacemos ruta

```php
TareaController@edit
return view('admin.tareas.create');
```

En el botón Editar en index poner ruta:

```php
href="{{ route('admintareas.edit') }}"
```

Nos manda un error que dice que faltan parámetros, está función edit recibe como parámetro un id, porque tenemos que editar una a la vez, ese parámetro se manda por medio de la ruta y es el que está guardado en la primer columna de nuestra tabla de tareas

Estamos dentro de un foreach, cada ciclo estamos en una tarea diferente por eso es que las variables van cambiando, vamos saltando de fila.
Ya sabemos como imprimirlas, ahora necesito pasar como parámetro en está ruta el id de cada tarea, para que el controlador sepa cuál queremos editar.

```php
href="{{ route('admintareas.edit', $tarea->id) }}"
```

Es muy importante ver qué parámetros nos pide cada función
Está nos dice que necesita recoger un id para poder trabajar entonces aquí se lo estamos pasando

Ahora vamos a usarlo dentro de `TareaController@edit`

```php
$tarea=Tarea::findOrFail($id);
return view('admin.tareas.edit', ['tarea'=>$tarea]);
```

Ahora en nuestra vista ya tenemos disponibles tooodos los datos de la tarea que decidimos editar pero falta mostrarlos, eso ya es bastante sencillo, parecido a lo que hemos estado haciendo pero ahora los pondremos dentro del atributo “value" para poner valores por defecto

```php
value={{$tarea->titulo}}
```

La única que es diferente es textarea que se pone entre las dos etiquetas
Para el archivo, como es nullable vamos a tener dos opciones, entonces vamos a poner una condición

```php
@if(! $tarea->file==NULL)
@endif
```

Si existe un archivo unicamente vamos a poner su referencia
Ponemos 3 veces el form-group

```php
<div class="form-group">
<label for="formGroupExampleInput">Archivo Actual: </label>
<a target="_blank" href="{{ asset("tareas/$tarea->file") }}" class="text-white">{{ $tarea->file }}</a>
</div>

<div class="form-group">
<label for="formGroupExampleInput">Modificar Archivo:</label>
<input  type="file" name="file" enctype  >
</div>

@else
<div class="form-group">
<label for="formGroupExampleInput">Subir Archivo:</label>
<input  type="file" name="file" enctype  >
</div>
@endif
```

Y ya tenemos todos los datos mostrados, ahora falta que si hago click en el botón de submit se guarden los cambios

### Función update

La función que va a guardar los cambios es update
Así como create los muestra y store los guarda, edit los muestra y update los guarda

```php
action="{{ route('admintareas.update', $tarea->id) }}"
```

Recuerden que para guardar archivos es necesario agregar `enctype="multipart/form-data"`, además, para la función update siempre pondremos `@method('PATCH')` y `@csrf`
Ahora hay que definir en donde guardar los cambios hechos, en el archivo `TareaController@update`

```php
$tarea=Tarea::findOrFail($id);
```

Copiamos y pegamos todo lo de store

```php
$tarea->update();
return redirect('admintareas');

$tarea->titulo=$request->get('titulo');
$tarea->descripcion=$request->get('descripcion');
$tarea->tipo_arch=$request->get('tipo_arch');
$tarea->date=$request->get('date');
$tarea->time=$request->get('time');
if ($request->hasFile('file')) {
$file = $request->file('file');
$name=$file->getClientOriginalName();
$destination = public_path() . '/tareas/';
$file->move($destination, $name);
$tarea->file=$name;
}
$tarea->update();
return redirect('admintareas');
```

### Función show

La función show nos permite ver cada elemento por separado
Hacemos nueva vista `/tareas/show.blade.php` y pegamos el mismo código que tareas-index, únicamente borramos todo el contenido de bienvenidos

En `TareaController@show`

```php
return view('admin.tareas.show');
```

Y le damos ruta a nuestro boton ‘Ver’, recordemos que recibe un id también

```php
href="{{ route('admintareas.show', $tarea->id) }}"
```

Para poder mostar los datos repetimos lo que hicimos en @edit

```php
$tarea=Tarea::findOrFail($id);
return view('admin.tareas.show', ['tarea'=>$tarea]);
```

Y unicamente faltaria mostrar los datos como lo hemos hecho anterioremente

### Función eliminar

No hay que hacer otra vista, unicamente utilizaremos el botón, en: `tareas/index.blade.php`

Vemos que el botón de eliminar es tipo submit entonces al darle click hará la action que tenga el formulario, en este caso será la función destroy

```php
action="{{ route('admintareas.destroy', $tarea->id) }}" method="POST" >
@csrf
@method('DELETE')
```

Dentro de `TareaController@destroy`

```php
$tareas=Tarea::findOrFail($id);
$tareas->delete();
return redirect('admintareas');
```

Regresamos a `phpow.blade.php` y ponemos rutas correspondientes

<!-- Esta parte creo que entra en lo de base de datos que se ve al principio -->

## Tabla de entregas

La entrega tiene que estar relacionada con dos cosas, con la tarea y con el usuario que la está subiendo, para obtener esas relaciones utilizaremos llaves foráneas.

- Hacemos un nuevo modelo

```sh
php artisan make:model Entrega
```

- Hacemos el controlador

```sh
php artisan make:controller EntregaController -r
```

- Hacemos la migración para crear tabla

```sh
php artisan make:migration create_entregas_table
```

Lo primero como siempre es definir las columnas que tendrá mi tabla
Y dentro de la función up() pondremos las columnas, así como las llaves foráneas:

```php
$table->id();
$table->unsignedBigInteger('user_id');
$table->unsignedBigInteger('tarea_id');
$table->string('file')->nullable();
$table->integer('cal')->default(0)->nullable();
$table->timestamps();

$table->foreign('user_id')->references('id')->on('users');
$table->foreign('tarea_id')->references('id')->on('tareas');
```

Subimos migración

```sh
php artisan migrate
```

Y checamos que se haya subido correctamente
Ahora hay que definir estas relaciones directamente en los modelos
Dentro de `User.php` ayudandonos de la documentación `Eloquent>Relationships`
Definiremos la relación que va de 1 Usuario a N Entregas (1 a muchos)

```pjp
public function entregas(){
return $this->hasMany('App\Entrega');
}
```

Y la inversa, dentro de `Entrega.php`, definimos que el padre de Entrega es un Usuario

```php
public function user(){
return $this->belongsTo('App\User');
}
```

Ahora con Tareas, dentro de `Tarea.php`

```php
public function entregas(){
return $this->hasMany('App\Entrega');
}
```

Y ahora dentro de `Entrega.php`

```php
public function tarea(){
return $this->belongsTo('App\Tarea');
}
```

Hacemos la ruta del controlador

```php
Route::resource('entrega', 'EntregaController');
```
