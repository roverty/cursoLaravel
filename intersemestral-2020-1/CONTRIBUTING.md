# CONTRIBUTING GUIDELINES

Con el fin de colaborar de manera ágil en este repositorio se siguen las siguientes convenciones.

* Para cada módulo del proyecto se crea una rama ([ver convenciones de nombrado](#Branches)) a partir de develop.
* Con el fin agilizar la *revisión de código* se sugiere cierta convención para el mensaje de los commit, revisar las convenciones [aquí](#Commits).
* Al terminar un módulo se debe realizar un *pull request* a la rama develop.
* Se usará el lenguaje español para comentarios y nombres de variables, sin embargo, para los commits y pull request se usará inglés.
* La convención de nombrado de variables, funciones, constantes, etc. dependerá del lenguaje de programación que se este usando. Existen tres convenciones básicas: 
  * Camell Case
  * Pascal Case
  * Snake Case (Underscore case)

## Branches

Las ramas deben tener nombres cortos y descriptivos. El nombre de su rama debe seguir la siguiente convención de nomenclatura:

 `token/branch-name`

* **Token** Esto denota la naturaleza de la rama. Use el token que mejor describa el propósito de la rama.
  * `feat` - Una rama temática o sobre una nueva característica del software
  * `docs` - Una rama para actualizar o agregar documentación.
  * `fix` - Un rara para correciones menores (reestructurar archivos, pero no cambiar realmente el contenido )
* **Branch name** Este es el nombre de la rama. Separe cada palabra con un guión.

Se debe tener especial cuidado de que rama se crea una nueva rama. Las ramas normalmente saldrán de la rama `develop`.

Los proyectos formales normalmente tienen 4 ramas, dos con vida infinita.

* master
* develop
* release
* hot fix

Para más información del uso de cada rama consultar [Uso recomendado de ramas](), sin embargo no es necesario saberlo para poder realizar contribuciones.

## Commits

El historial de `commit`'s de cada archivo debe contar una historia. 

Cada commit debe presentar la siguiente estructura multilínea

```markdown
#header
tipo: Descripción corta menor de 50 caracteres.
[nueva línea]
#body
Descripción más detallada(puede haber viñetas)
[nueva línea]
#footer
```

Se puede omitir el *body* y el *footer* en caso de tratarse de cambios que prácticamente se expliquen así mismos.

Para el *tipo encabezado* (header) del commit se recomienda seguir la siguiente nomenclatura.

* **feature:** una nueva característica 
* **fix:** una corrección de errores
* **docs:** cambios a la documentación
* **style:** formateo, faltan puntos y coma, etc. sin cambio de código
* **refactor:** refactorización del código de producción
* **test:** agregar pruebas, prueba de refactorización; sin cambio de código de producción
* **chore:** actualizar las tareas de compilación, las configuraciones del administrador de paquetes, etc. sin cambio de código de producción

Un ejemplo de lo anterior sería

```shell
feat: Created new function 

The function getGrades() allow us to get all students grades
from all semesters of his carreer.
```

## Changelog 

El historial de lanzamientos y de cambios importantes se puede encontrar en [CHANGELOG](CHANGELOG).

