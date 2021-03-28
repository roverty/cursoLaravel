# Curso laravel

[TOC]

## Curso express de introducción a la programación en php

### Características de php

* PHP es un acronónimo recursivo (esto es que para definirse una el mismo nombre), PHP is a Hipertext Preprocessor, algo así como decir, php se define como *php preprocesador de hipertexto*.
* Hay varias clasificaciones de lenguajes de programación, existe una que divide a los lenguajes de programación en dos grande categorías: compilado e interpretado.
  * Un lenguaje compilado es aquel cuyo procesamiento es realizado por un compilador, recibe como entrada en código fuente y como salida obtenemos un archivo ejecutable. Todas las líneas del programa son revisadas y al final se muestra un reporte con todos los errores si es que los hay.
  * Por otra parte, un lenguaje interpretado es aquel cuyo procesamiento (revisión y ejecución) se va haciendo línea por línea. De manera que sí el código tiene 20 líneas y hay un error en la línea 10, de la línea 11 en adelante no se revisarán ni se ejecutarán.
* PHP es un lenguaje interpretado
* PHP es un lenguaje que *corre del lado del servidor* como se suele decir, lo cual significa que  es ejcuta por servidores para proveer ciertos recursos a otras computadoras.

### Sintaxis básica

* Es posible combinar código php y HTML de manera casi indistinta. 
  * Si se combina código de php y HTML, el archivo tiene que tener extensión `.php`

* Existen palabras reservadas, es decir palabras que no podemos usar para programar debido a que el lenguaje las necesita para poder funcionar, alguna de estos son "this", "if", "while", etc.

Para indicar que queremos que nuestro código se procese como código php, es necesario agregar la etiqueta `<?php` de apertura y `?>` para indicar el cierre.

```
<?php
// código de PHP 
?> 
```

Para imprimir un mensaje en "pantalla" utilizaremos `echo` o `print`, la realidad es cuando usemos laravel nunca veremos un `echo` o un `print`, por ahora imprimamos un mensaje en pantalla.

```
<h1> Aquí arriba puede ir código de HTML </h1>
<?php
    echo "Hola mundo";
?>    
<h2> Aquí abajo también puede ir código de HTML </h2>    
```

**Comentarios** 

En todos los lenguajes de programación existirá alguna forma de poenr comentarios, que simplemente son  sentencias u oraciones que el interpréte ignorará, le sirven al programador para hacer alguna anotación u observación de alguna variable o de la lógica que su código sigue.

Para hacer comentarios de varias líneas se utiliza `/*` para abrir el comentario y  `*/` para cerrar el comentario.

Par hacer comentarios de una sola línea podemos utilizar `//` o `#`

**Todas las sentencias de php llevan `;` al final **

### Variables y tipos de variables

Cada lenguaje de programación define sus variables como mejor le parece.

Las variables nos sirven para almacenar datos de nuestro programa o del usuario que lo utiliza, por ejemplo, podemos almacenar el nombre del usuario, la edad, etc.

* Las variables solo existen mientras el programa se este ejecutando, una vez que el programa termine las variables se "destruyen".

Una variable se puede ver como una pequeña caja en donde ponemos guardar algo.

De manera un poco más técnica una variable es un espacio reservado en memoria (RAM) que sirve para almacenar valores determinados.

La característica principal de las variables es que tienen un "nombre" o identificador y un tipo de dato que pueden almacenar, es decir, habrá variables que solo puedan almacenar número enteros, otras solo podrán almacenar números decimales y algunas más solo podrán almacenar "texto".

Siguiente con la analogía, cuando nosotros *declaramos* una variable es porque estamos asignandole a un cajita en particular un identificador y una descripción de los objetos que se pueden guardar ahí.

Veamos como se hace en php

```
<?php
$nombre = "Rodrigo" // Esta es una variable de tipo String o cadena
?>
```

Como se puede ver en el ejemplo anterior,  para crear una variable, o propiamente dicho *declarar* una variable se utiliza el `$` y un identificador.

Notése que las variable `$nombre` y `$Nombre` son distintas, es decir, las variables distinguen de mayúsculas y minúsculas, por ello se conocen como "case sensitive"

### Operadores

### Estructuras de control

### Arreglos

### Funciones

## Curso express de programación orientada a objetos en php

### Definiendo el paradigma orientado a objetos

### Clases y objetos

### Métodos y atributos

### Constructores

### Herencia

* namespace
* chain functions