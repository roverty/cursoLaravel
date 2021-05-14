<?php

echo "Hello world!\n";
print "Hola mundo\n";
// Esto es un comentario
# Esto tambien es un comentario
/* Comentario en linea 1
* Comentario en linea 2
*/

// Ilustrando el concepto de variable
$nombre="Rodrigo";
//$nombre = 3.14; // Esto debería fallar :(
//$nombre = false;
echo "Mi nombre es ".$nombre."\n";

//Estructuras de control

// COndicionales (if)
$edad = 15; //Asignamos valores
if(true){
    echo "Entre al if\n";
}

if(false){
    echo "Entre al if X2\n";
}

if($edad == 12){ // DOs igual, es comparacion
    echo "Tu edad es 12 años\n";
}
if($edad == 15){
    echo("Tu edad es 15 años\n");
}

$edadLuis = 20;
$edadAna = 17;

if($edadAna >= 18){ # 1 condicional
    echo("Puede tener novio\n");
}else{
    echo("Ana no puede tener novio.\n");
}

if($edadAna >= 18 && $edadLuis > 18){ # 2 condicional
    echo("Pueden ser novios\n");
}else{
    echo("No pueden ser novios, tan chiquitos.\n");
}

if($edadAna > 18 || $edadLuis > 18){ # 3 condicional
    echo("Pueden ser novios\n");
}else{
    echo("No pueden ser novios, tan chiquitos.\n");
}

// Else if
if($edadAna >= 18 && $edadAna<=25){ # 4 condicional
    echo("Ana esta en la universidad\n");
}elseif($edadAna > 15 && $edadAna < 18  ){
    echo("Ana esta en la prepa\n");
}else{
    echo("Probablemente Ana este en la secundaria o quizá ya acababado la carrera");
}

// Seguimos en estructuras de control
// AHora veremos ciclos, basicamente hay 2: for y while

//for($i=0;$i<10;$i=$i+1){ # SE puede hacer así
for($i=2;$i<10;$i++){ # Esta manera es la mas comun, se usa operardor post incremento
    $modulo = $i % 2;
    echo "Estamos en la iteración ".$i."\n";
    if($modulo == 0 ){
        echo("EL numero ".$i." es par\n");
    }else{
        echo("EL numero ".$i." es impar\n");
    }
}

//Ciclo while

$contador = 0;

while($contador != 5){ // Usando logica negada
    echo("EL valor del contador es ".$contador."\n");
    $contador++;
}
echo("Segundo while\n");
$contador = 0;
while($contador < 5){ # Segundo while
    echo("EL valor del contador es ".$contador."\n");
    $contador++;    
}

do{ # do while
    echo("The counter value is ".$contador."\n");
    $contador++;    
}while($contador < 5);

// Arreglos.
//Declaracion de Arreglos (por indice)
$instructores = ["Rodrigo","Anallely","Karina","Lizeth"];

echo "El instructor titular es ".$instructores[0]."\n";
echo("La longitud del arreglo ".count($instructores))."\n";

for($i=0;$i<count($instructores);$i++){
    echo("Este es el instructor ".$instructores[$i]."\n");
}

// Sentencia For each
foreach ($instructores as $instructor){
    echo("Soy el instructor ".$instructor."\n");
}

$persona1 = [ # Arreglos asociativos
    "nombre" => "Rodrigo",
    "apellidos" => "Garcia Medina",
    "edad" => 12
];
foreach ($persona1 as $p){
    echo($p."\n");
}

$persona2 = [ # Arreglos asociativos
    "nombre" => "Miguel",
    "apellidos" => "Garcia Medina",
    "edad" => 18
];

$persona3 = [ # Arreglos asociativos
    "nombre" => "Anallely",
    "apellidos" => "Flores Ramirez",
    "edad" => 17
];

$personas = [$persona1,$persona2,$persona3];

foreach ($personas as $persona){
    echo("Los datos de una persona son: \n");
    foreach ($persona as $p){
        echo($p."\n");
    }
}
































?>









// Aqui va codigo de HTML