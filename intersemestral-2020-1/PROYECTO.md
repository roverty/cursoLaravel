# Curso Laravel

## Proyecto: Coplix

La empresa Coplix desea vender streaming de películas para lo cual se le pide a un grupo de desarrolladores web que desarrollen el sitio de la empresa.

La empresa cuenta con un catálogo de películas  de las cuales se requiere almacenar: 

* Nombre de la película
* Año en que se estreno la película
* Una breve descripción de la película
* Genéro al que pertenece la película
* Y mínimo uno, máximo 3 actores principales de la película.

Además se solicita almacenar el país de origen de la película para lo cual se debe crear un catálogo que guarde los nombre de los países.

Por otra parte se solicita que los **clientes**, al estar registrados y logeados pueden agregar cualquier película a su lista de reproducción.

Para poder registrar a los cliente en el sitio web es necesario que se le soliciten los datos de su tarjeta de crédito, por motivos de seguridad  se requiere que los datos de la tarjeta se almacenen en una tabla. De la tarjeta se debe almacenar:

* El número de cuenta
* mes y año de expiración

Del lado del administrador se requiere que:

* Si el usuario esta logeado y tenga el rol de administrador éste debe poder realizar lo siguiente:
  * Debe poder crear películas para lo cual se piden los mismos datos que se muestran en el catálogo.
  * Además, debe poder eliminar y actualizar cualquier película.

### Posibles vistas que se deben incluir

* Vistas para el usuario cliente
  * Se debe mostrar un vista en dónde se muestren todas las películas del catálogo.
  * Se debe mostrar una vista en dónde se vean las películas que el usuario ha agregado a su coleción.
* Para el usuario administrador
  * Se debe mostrar una vista que le indique al usuario las acciones que puede hacer sobre cada objeto, o entidad, por ejemplo, para las películas debe haber un menú o forma en que el usuario admin pueda ver las acciones que puede realizar: editar, eliminar, etc.
* Para el usuario anonónimo
  * Se debe mostrar la página principal que presente un carrusel o alguna forma atractiva de presentar las películas que a usted como desarrolador le parezca más interesante.
  * Se debe de invitar al usuario a registrarse en coplix
  * También se debe mostrar un a partado que de una explicación acerca de la empresa.

### Requerimientos técnicos

1. Se debe crear los controladores de recursos necesarios.
2. Las rutas deben corresponder con los métodos vistos en clase: index, create,store,destroy, etc.
3. Las rutas debe estar agrupadas por algún criterio en particular
4. Todas las rutas deben tener "nombre", es decir, se debe utilizar la función `name()`
5. Tener cuidado con el tipo de relación.

