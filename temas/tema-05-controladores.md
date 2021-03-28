## Controladores

En las *rutas* de laravel se podrán llevar a cabo las funciones más comunes en un sitio web que de acuerdo con la arquitectura *MVC* las podríamos enumerarlas como

* Obtener definir u obtener datos de una base de datos, *modelo*.
* Desarrollar la *lógica de negocio*  del resto de la aplicación, *controlador*.
* Mostrar los datos al cliente de una manera *elegante*, *vista*.

Sin embargo, es incorrecto poner mezclar la lógica con los datos y la presentación de los mismo en una sola porción de código.

El punto de entrada de nuestro curso fueron las *rutas de laravel* y por lo tanto lo más natural para el *lector* sería aprender a usar los *controladores* ya que están intímamente ligados con las *rutas*. Si no tuvieramos ésta última coincidiencia, la recomendación (personal) sería proceder de la siguiente manera:

* Aprender todo lo relacionado con el **modelo**, como definir los datos, manipularlos y consultarlos directamente en la base de datos.
* El siguiente paso sería procesar la información obtenida para lo cual en ese momento estaremos aprendiendo a usar los **controladores**
* Finalmente, *lo menos importante*, por lo menos del lado de la programación sería buscar la manera más adecuada, elegante e incluso atractica de presentar la información al cliente, es decir  las **vistas**, esto último suele ser trabajo de los desarrolladores *frontend*.

**Sin más preámbulos comencemos.**

Para crear un controlador utilizamos un comando de `artisan`

```shell
php artisan make:controller <NombreController>
# Adicionalmente podemos incluir banderas, por ejemplo

php artisan make:controller <NombreController> -r
php artisan make:controller <NombreController> --resource
```

La estructura de un controlador es la siguiente

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
```

Al ejecutar el comando `php artisan make:controller` obtendremos una clase totalmente vacía, en el ejemplo de arriba se muestran 2 métodos comúnmente encontrados en un controlador.

**Consideraciones** 

* Un controlador debe intentar referirse al un mismo objeto, por ejemplo si se crea un controlador llamado `PostController`, sus métodos deben estar relacionados con la manipulación de *posts*.

* No es obligatorio pero, el nombre de los controladores suele terminar con la palabra `Controller`.

* Los controladores se guardan en `app/Http/Controllers`.

* El controlador no es más que una clase de php.

* Como se vio en la sección de [rutas](#Rutas en laravel), para ligar una ruta con un método del controlador se puede hacer lo siguiente.

  ```php
  Route::get('ruta', 'AdminController@method');
  ```

  Si el controlador se encuentre en una subdirectorio de `app/Http/Controllers`, podemos hacer lo siguiente.

  ```php
  Route::get('ruta', 'Sub-dir\AdminController@method');
  ```

### Controladores y middleware

Se puede asociar un `middleware` a un método del controlador o a todo el controlador en sí.

Para asociar un middleware a un método conviene hacerlo desde la ruta, de la siguiente manera.

```php
Route::get('profile', 'UserController@show')->middleware('auth');
```

Para asociar el middleware a toda la clase utilizamos el método constructor de la clase

```php
class UserController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // Se asocia el middleware auth a toda la clase
        $this->middleware('auth');
		
        // El middleware log solo se aplica a la funcion index
        $this->middleware('log')->only('index');

        // El middle ware subscribed se aplica a todos los métodos excepto a store
        $this->middleware('subscribed')->except('store');
    }
}
```

Otra forma de expresar las restricciones de middleware es pasando un arreglo asociativo al método middleware.

```php
$this->middleware('guest:admin', ['except' => ['logout']]);
```

### Resource controllers

Un resource controller se puede traducir como un controlador de recursos, simplemente es un controlador que tiene predefinidas ciertas funciones relacionadas con el CRUD (create, read, update y delete), para crear un controlador de recursos utilizamos la bandera `--resource`

```php
php artisan make:controller PhotoController --resource
```

El contenido de la clase controladora es 

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
```

Y para registrar el controlador en `routes/web.php` bastará una sola línea de código.

```php
Route::resource('photos', 'PhotoController');
```

Lo anterior registrar las rutas que se muestran a continuación.

![recursos](img/tema-05/resource_routes.png)

La siguiente tabla muestra las acciones que cada método debe realizar en un controlador de recursos

![actiones](img/tema-05/resource_actions.png)

Todas las rutas que sean ajenas al CRUD deben agregarse antes que la llamada al método `resource`, por ejemplo:

```php
// Va antes de la llamada al método resource
Route::get('photos/popular', 'PhotoController@method'); 

Route::resource('photos', 'PhotoController');
```

### Controladores, datos y retorno de vistas

La mayoria de las veces los métodos del controlador regresarán objetos de tipo view, veamos los escenarios posibles que podríamos llegar a tener.

El caso más sencillo es regresar una simple vista llamada `home`

La vista `home` debe estar en `resources/views`

```php
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        return view('home');
    }
}
```

Pero, ¿Qué pasa si queremos retornar datos? Utilizamos el método `with()`, el cual se puede encadenar consigo mismo las veces que sea necesario.

`with()` recibe 2 parámetros:

* La llave o identificador de la variable que estamos enviando, con dicha llave esta variable será identifica en la vista `home`.
* El valor

```php
class HomeController extends Controller
{

    public function index()
    {
        $nombre = 'Rodrigo';
        $curso = 'Laravel'
        return view('home')
            ->with('nombre',$nombre)
            ->with('curso',$curso);
    }
}
```

Inclusive podemos enviar arreglos utilizando la misma *notación*.

Se puede usar notación de arreglo asociativo de la siguiente manera

```php
class HomeController extends Controller
{

    public function index()
    {
        data =[
            'nombre' = 'Rodrigo',
        	'curso' = 'Laravel'
        ];    
        return view('home',$data);
    }
}
```

Hay cosas que no se mencionan en ésta sección, por ejemplo, como tener rutas para `api`'s o los método útiles a la hora de trabajar con formularios. La razón de no mencionarlos es que en esta primera entrega no los vamos a ocupar, si desea conocerlos, como siempre se puede recurrir a la documentación https://laravel.com/docs/6.x/controllers. 

