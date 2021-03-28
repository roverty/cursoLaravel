# Curso laravel

## Rutas en laravel 

Cómo se vio anteriormente, cualquer sitio web utiliza la arquitectura cliente servidor, los clientes hacen peticiones al servidor y este (en el caso de los sitios web) contesta por medio de texto plano. Cuando un cliente hace una petición a nuestro sitio, ésta siempre llega al archivo `public/index.php`, se verifica que la petición sea válida y segura, posteriormete la URL que el cliente proporcionó se busca en un archivo que analizaremos a continuación, `routes/web.php`.

Toda la información escrita en este documento puede ser ampliada al consultar la documentación oficial https://laravel.com/docs/5.0/routing

> Nota: En versiones anteriores de laravel las rutas se consultaban en un solo archivo llamado app/Http/routes.php, en versiones recientes existe un directorio llamado routes y dependiendo cómo se haga la petición se invoca a uno de sus cuatro archivos.

En directorio `routes/`  existen 4 archivos para administrar nuestras rutas:

* `routes/web.php`: Define las rutas para la interfaz web del proyecto.

* `routes/api.php` : Define las rutas de una API de tipo REST para que alguna otra interfaz web o móvil adquiera información de nuestro sitio web.

  Ejemplos de sitios para entender el concepto de API.

  * https://pokeapi.co/
  * https://fake.rest/docs/getting-started

* `routes/console.php`: En console.php puede definir comandos simples basados en `clousures` para la línea de comando. Para más información 

* `routes/channels.php`: Se utiliza para declarar autorización para canales de notificación.

De los 4 archivos mencionados anteriormente, solo los 2 primeros se ocupan con mayor frecuencia. Para esta entrega del curso solo utilizaremos `routes/web.php`

<!-- Hablar de CALLBACKS Y CLOUSURES -->

### Métodos de la clase Route

La sintaxis básica y común para declarar una ruta es

```php
Route::<metodo_o_>(<uri>,<callback>)
```

* En donde  el método puede ser cualquier de los siguientes

  * GET
  * POST
  * PUT
  * PATCH
  * DELETE

  Existen más métodos pero se listaron lo que se suelen ocupar a la hora de crear un CRUD (create, read,update and delete).

* La dirección *URI* se refiere a la ruta que se desea, se debe tener cuidado de seguir convenciones a la hora de crear las direcciones, esto ayudará que el proyecto se desarrolle de una manera más sencilla y *elegante*.

  <!-- Agregar convenciones -->

* La función **callback** se puede declarar como una *closure* o se puede referencia a algún método de algún controlador.

  ```php
  // Usando una closure
  Route::get('saludar', function () {
      return 'Hello World';
  });
  // Haciendo referencia al método de algun controlador
  Route::get('saludar2','WelcomeController@saludar');
  ```

  Para probar estas rutas podemos iniciar nuestro proyecto `php artisan serve` y escribir en el navegador la siguiente dirección `http://127.0.0.1:8000/saludar`.

  Saludar2 no se puede probar porque se necesita crear el controlador. En caso de querer probarlo, crear el controlador con la siguiente instrucción (El tema de controladores se verá más adelante).

  ```shell
  php artisan make:controller WelcomeController
  ```

  Ahora, en el editor de textos de su preferencia buscar el archivo `app/Http/Controllers/WelcomeController.php` y se debe ver como el siguiente.

  ```php
  <?php
  
  namespace App\Http\Controllers;
  
  use Illuminate\Http\Request;
  
  class WelcomeController extends Controller
  {
      public function saludar(){
          //echo 'Hola mundo';
          return 'Hello World';
      }
  }
  ```

### Regresar vistas

Por simplicidad se ocupar *closures* pero al momento de tener que hacer el procesado de mucha información se debe usar los métodos de las *clases Controller*, esto con el fin de tener un código modulado.

Tenemos dos formar para regresar vistas (Las vistas representan el contenido que el usuario verá renderizado como simple HTML)

**Forma 1**

```php
Route::get('/', function () {
    /*Aquí antes se puede hacer un poco de 
    programación, poner if's o switch case, en si
    todas las estructuras de control, solo que
    el quizá un for o un while no tendría mucho caso*/
    return view('welcome');
});
```

**Forma 1 enviando información a la vista**

```php
Route::get('/', function () {
    /*Aquí antes se puede hacer un poco de 
    programación, poner if's o switch case, en si
    todas las estructuras de control, solo que
    el quizá un for o un while no tendría mucho caso*/
    return view('welcome')
        ->with('name','Rodrigo')
});
```

**Forma 2**

```php
Route::view('/welcome', 'welcome');
```

**Forma 2 enviando información a la vista**

```php
Route::view('/welcome', 'welcome', ['name' => 'Rodrigo']);
```

Tanto en la forma 1 como en la forma 2 se hace referencia a un archivo llamado `welcome`, el cual se encuentra en `resources/views`. Todos los archivos que se consideren vistas deben estar en la carpeta `views` y deben tener la extensión `.blade.php`, el motivo se explica en la sección de *vistas*.

### Rutas con parámetros

> [laravel 6.x docs] : Algunas veces necesitará capturar segmentos del URI dentro de su ruta. Por ejemplo, es posible que deba capturar la identificación de un usuario de la URL. Puede hacerlo definiendo parámetros de ruta:

Para que laravel identifique que se trata de un parámetro, éste debe estar encerrado entre llaves;

* En el nombre del parámetro solo se permiten caracteres alfanúmericos y no se permiten guiones medios `-` 
* Se tienen que *n* parámetros en la función callback por cada *n* parámetros en la dirección URI;
  * El orden de los parámetros del URI puede ser distinto que el de los parámetros de las funciones. Solo importa el orden.

```php
// Ejemplo 1
Route::get('user/{id}', function ($id) {
    return 'User '.$id;
});

// Ejemplo 2
Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'El Post '.$postId.' tiene un comentario como id '.$commentId;
});
```

#### Parámetros opcionales

> Ocasionalmente, puede necesitar especificar un parámetro de ruta, pero hacer que la presencia de ese parámetro de ruta sea opcional. 
>
> * Puede hacerlo colocando un `?` después del nombre del parámetro. 
> * Asegúrese de dar a la variable correspondiente de la ruta un valor predeterminado

```php
Route::get('user/{name?}', function ($name = null) {
    return $name;
});

Route::get('user/{name?}', function ($name = 'John') {
    return $name;
});
```

#### Parámetros restringidos por expresiones regulares

Las expresiones regulares no son otra cosa más que "cadenas de texto" con patrones de búsqueda, por ejemplo, la siguiente cadena identifica a todas las cadenas que empiecen con mayúscula `[A-Z][a-z]+`, el tema de expresiones regulares es bastante basto. Las restricciones por expresiones regulares no son tan usadas por lo tanto esta sección es meramente informativa. 

En caso de que no se cumpla con la restricción en la ruta, laravel enviará un error `404`.

Para restringir las rutas encadenamos el método `where` en la ruta, 

* el primer parámetro es el nombre del parámetro que se quiere restringir y 
* el segundo parámetro es una cadena con la restricción.
* En caso de querer restringir más de un parámetro, se le pasa un arreglo, como se muestra en el tercer ejemplo.

```php
// Ejemplo 1
Route::get('user/{name}', function ($name) {
    //
})->where('name', '[A-Za-z]+');

// Ejemplo 2
Route::get('user/{id}', function ($id) {
    //
})->where('id', '[0-9]+');

// Ejemplo 3
Route::get('user/{id}/{name}', function ($id, $name) {
    //
})->where(['id' => '[0-9]+', 'name' => '[a-z]+']);
```

### Rutas con nombres

Laravel permite *ponerle un alias* a nuestras rutas o como la documentación lo indica *nombrar* las rutas, lo cual es *MUY* útil ya que si usamos la ruta a la hora de programar y ésta cambia en algún momento, tendremos que cambiarla en todos los lugares donde la ocupamos, *nombrar* las rutas previene este problema.

Para nombrar las rutas basta con encadenarle a la ruta el método `name()`.

<!-- Hablar de la convención de nombrado -->

```php
// Utiliando una closure
Route::get('user/profile', function () {
    //
})->name('profile');

// Utilizando un metodo del controlador UserProfileController
Route::get('user/profile', 'UserProfileController@show')->name('profile');
```

### Grupos de rutas y prefix

Los grupos de ruta laravel permiten compartir propiedades de ruta, como prefijos y middlewares en todas las rutas dentro de cierto grupo. La sintáxis para crear grupos puede ser a través del método `group`, `prefix`, `name`, `namespace` o `middleware`, siendo el primero el método más general.

`group()` acepta como primer parámetro un **arreglo asociativo** con las *reglas* del grupo, las cuales pueden ser un prefijo, un namespace o un middleware como se puede ver en los siguientes ejemplos.

#### Ejemplo 1

```php
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {
	Route::get('/', 'PostController@index')->name('index');
	Route::get('/create', 'PostController@create')->name('create');
	Route::post('/store' 'PostController@store')->name('store');
});
```

Al grupo se le pasa `prefix` y `as`, sus valores son *post* y *posts* respectivamente, esto significa que todas la rutas agrupadas con tendrán el prefijo post, esto es:

* Se accede la primera ruta de la siguiente manera 127.0.0.1/post/
* A la segunda ruta como 127.0.0.1/post/create
* A la tercera ruta como 127.0.0.1/post/store

Además se accede a los nombres de las rutas respectivamente como `posts.index`, `posts.create` y `posts.store`.

La forma de entender el agrupamiento es exactamente la misma para los siguientes ejemplos y lo que se intenta ejemplificar  son las formas comunes de utilizar *los grupos*.

#### Ejemplo 2

El segundo ejemplo muestra como hacer un encadenamiento de grupos.

```php
Route::group(['prefix' => 'posts', 'as' => 'posts.'], function () {

	Route::get('/', 'PostController@index')->name('index');

	Route::group(['middleware' => ['auth']], function () {
		Route::get('/create', 'PostController@create')->name('create');
		Route::post('/store' 'PostController@store')->name('store');
	});
});
```

 Nuevamente las rutas se agrupan primeramente por *prefijo* y dentro de esta agrupación, alguna de las rutas se agrupan por `middleware`, lo cual implicia que todas las rutas dentro de esa agrupación solo podrán ser accedidas de acuerdo a la restricción del middleware que en éste caso, requiere que el usuario este logeado.

#### Ejemplo 3

Ya vimos ejemplos de como utilizar grupos con arreglos ahora veámoslo utilizando los  métodos directamente.

```php
Route::prefix('posts')->name('posts.')->group(function () {
	Route::get('/', 'PostController@index')->name('index');
	Route::get('/create', 'PostController@create')->name('create');
	Route::post('/store','PostController@store')->name('store');
});
```

Este último ejemplo es mi forma preferida de utilizar los grupos, porque és clara, al menos para mí, algunos otros programadores prefieren utilizar la notación de *arreglo asociativo*.

### Middleware

¿Qué pasa si alguna ruta le encadenamos el método `middleware()` de la siguiente manera.

```php
Route::get('user/profile', function () {
    //
})->middleware('auth')->name('profile');
```

**Respuesta**: Laravel nos redirige al *login* del sitio web debido a que en la función `midddleware` estamos colocando la palabra `auth`, es decir, estamos limitando el acceso a la ruta a solo aquellos usuarios que se encuentre **logeados**.

La llamada a middleware también se puede hacer el método constructor de cualquier clase controladora, para ver un ejemplo ver el archivo `app/Http/Controllers/HomeController.php`

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
        $this->middleware('auth'); // OJO AQUÍ
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

### Model binding

<!-- Falta esto -->

### Route:list et all

Por último,  para verificar que las rutas se hayan registrado en la aplicación podemos usar el siguiente comando de artisan

```shell
php artisan route:list
```

Algunas veces todo estará bien y la ruta no se actualizará en la aplicación por lo cual se recomenda limpiar el cache relacionado con las rutas para lo cual podemos utilizar los siguientes comandos de `artisan`.

```shell
artisan route:clear # Limpia el cache de la aplicación
artisan route:cache # Carga las rutas a cache, desde la versión 5.4 de laravel parece tener un ligero bug.
```

Toda la información que pudo haber sido omitida en este documento se puede encontrar en la documentación de laravel:

https://laravel.com/docs/6.x/routing
