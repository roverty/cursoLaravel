# Creación de grahook(sitio web) día 05

## Objetivos

- Entregar tareas
- Calificaciones

## Controlador de recursos

### Función show

Necesitamos obtener dos valores para poder guardar la entrega, el id de la tarea y el id del usuario, que tenemos que sacar de algún lado.

Dentro de `home.blade.php`, ponemos ruta al botón de Enviar para aprovechar que de aquí podemos sacar el id de la tarea

```php
href="{{ route('entrega.show', $tarea->id) }}"
```

Ahora ese tarea_id ya está en la parte de entregas.

Hacemos vista `entregas/show.blade.php` y pegamos código de entregas.html
Dentro de `EntregaController@show`

```php
$tarea=Tarea::findOrFail($id);
return view('entregas.show',['tarea'=>$tarea]);
use App\Tarea
```

Dentro de nuestro formulario

```
action="{{ route('entrega.store') }}"
method=”POST”
enctype="multipart/form-data"
@csrf
```

Tenemos un input invisible, esto nos sirve para mandar en el formulario valores sin que el usuario los tenga que poner manualmente. A nuestro input invisible le damos valor
`value="{{ $tarea->id }}`

### Función store

Dentro de `EntregaController@store`

```php
use App\Entrega;
$entrega=new Entrega();
$entrega->tarea_id=request($key = 'tarea_id');
$entrega->user_id=Auth::user()->id;
use Illuminate\Support\Facades\Auth;
```

Para el archivo es masomenos lo mismo que con tareas

```php
$file = $request->file('file');
```

Para mi comodidad, yo quise que sus archivos automaticamente se guardaran con su username entonces

```php
$username=Auth::user()->name;
```

Concatenamos el nombre de usuario para que no se repitan

```php
$name=$username.$file->getClientOriginalName();
public/entregas
$destination = public_path() . '/entregas/';
$file->move($destination, $name);
Guardamos nombre en la tabla
$entrega->file=$name;
```

Y guardamos

```php
$entrega->save();
return redirect('/');
```

Verificamos que se haya guardado todo en la BD, si ponemos el cursor sobre las llaves foráneas incluso ahí nos dice a qué usuario y a qué tarea pertenece cada entrega.

### Mostrar tabla de entregas en cada tarea para el administrador

Dentro de `TareaController@show`hacemos variable que contenga todas las entregas y pasamos la variable a la vista

```php
$entregas=Entrega::all();
return
view('tareas.show', ['tarea'=>Tarea::findOrFail($id), 'entregas'=>$entregas]);
use App\Entrega;
```

En `tareas/show.blade`pegamos código de tablas.html
Hacemos ciclo para recorrer entrega

```php
@foreach($entregas as $entrega)
```

Si lo probamos nos muestra todas las entregas pero no todas pertenecen a está tarea entonces hay que poner una condición.
Y ponemos condición para que solo muestre las de la tarea actual

```php
@if($entrega->tarea_id == $tarea->id)
Ponemos valores a nuestras columnas
{{ $entrega->user->name }}
<a target="_blank" href="{{ asset("entregas/$entrega->file") }}">{{ $entrega->file }}</a>
```

### Subir calificaciones

Dentro de `tareas/show.blade` en el formulario

```php
<form action="{{ route('entrega.update', $entrega->id) }}" method="POST">
@method('PATCH')
@csrf
```

Dentro de `EntregaController@update`

```php
$entrega=Entrega::findOrFail($id);
entrega->grade=$request->get('grade');
$entrega->update();
return back();
```

Si actualizamos la página ya está guardada la calificacion pero deberíamos poder verlas en está tabla
Vamos a modificar el value dentro del input, para mostrar las calificaciones ya registradas, dentro del input ponemos:

```php
value="{{ $entrega->grade }}"
```

### Tabla de calificaciones para el usuario

Hacemos vista `grades.blade.php`, pegamos código y damos ruta en `app.blade.php`
Dentro de `HomeController` hacemos nueva función que recibe id de user

```php
public function grades($id){
return view('grades');
```

Hacemos ruta en `web.php`

```php
Route::get('/grades/{id}', 'HomeController@grades');
```

Y en `app.blade` damos url

```php
href="{{ url('grades/'.Auth::user()->id) }}"
```

Revisamos que la vista funcione
Ahora qué datos tenemos que pasar para poder mostrar las calificaciones que nos interesan?

```php
$entregas=Entrega::all();
$user=User::findOrFail($id);
return
view('grades', ['entregas'=>$entregas, 'user'=>$user]);
use App\User;
```

Dentro de `grades.blade.php`

```php
@foreach($entregas as $entrega)
@if($entrega->user_id==$user->id)
@if(! $entrega->grade==NULL)
<tr>
<td>{{ $entrega->tarea->title }}</td>
<td>{{ $entrega->grade }}</td>
</tr>
```
