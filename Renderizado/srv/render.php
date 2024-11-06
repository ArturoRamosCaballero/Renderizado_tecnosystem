<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {

 $lista = [
  [
   "nombre" => "BARRERA GONZALEZ ANGELICA YOLOTZIN",
   "chistes" => [
     "¿Por qué los programadores prefieren el invierno? Porque en invierno no hay bugs, hay ‘frost bytes’.",
     "¿Cuál es el lenguaje de programación favorito de los gatos? ¡Meow-ruby!"
   ]
  ],
  [
   "nombre" => "CASTRO RODRIGUEZ JUSTIN",
   "chistes" => [
     "¿Por qué a los programadores no les gusta la naturaleza? ¡Porque hay demasiados bugs!",
     "¿Cómo llaman los desarrolladores a su familia? Pa-ram-eter."
   ]
  ],
  [
   "nombre" => "LUQUE MENDOZA JORGE",
   "chistes" => [
     "¿Qué hace un programador cuando está triste? Llora en modo debug.",
     "¿Por qué el programador fue al psicólogo? Porque tenía demasiadas excepciones."
   ]
  ],
  [
   "nombre" => "MELGAR ANGELES GABRIELA SARAHI",
   "chistes" => [
     "¿Cuántos programadores se necesitan para cambiar una bombilla? Ninguno, es un problema de hardware.",
     "¿Qué hace un programador cuando tiene hambre? Pide un byte."
   ]
  ],
  [
   "nombre" => "MERCADO MENDEZ ESTEFANI",
   "chistes" => [
     "¿Por qué Java es la bebida favorita de los programadores? Porque siempre necesitan café.",
     "¿Qué dijo el servidor al cliente? No me hables hasta después de la solicitud."
   ]
  ],
  [
   "nombre" => "RAMOS CABALLERO ARTURO ALEJANDRO",
   "chistes" => [
     "¿Cómo saludan los programadores? ¡Hola, mundo!",
     "¿Por qué el servidor rompió con su pareja? Porque había demasiadas conexiones."
   ]
  ],
  [
   "nombre" => "REYES BAEZ ESTEFANY MARIANA",
   "chistes" => [
     "¿Por qué los programadores confunden Halloween con Navidad? Porque Oct 31 es igual a Dec 25.",
     "¿Qué hace un programador en su tiempo libre? Descompila."
   ]
  ]
 ];

 // Genera el código HTML de la lista.
 $render = "";
 foreach ($lista as $persona) {
  /* Codifica nombre y chistes para que cambie los caracteres
   * especiales y el texto no se pueda interpretar como HTML.
   * Esta técnica evita la inyección de código. */
  $nombre = htmlentities($persona["nombre"]);
  $chistes = array_map("htmlentities", $persona["chistes"]);
  $render .=
   "<dt>{$nombre}</dt>
    <dd>{$chistes[0]}</dd>
    <dd>{$chistes[1]}</dd>
    <br>";
 }

 devuelveJson(["lista" => ["innerHTML" => $render]]);
} catch (Throwable $error) {

 devuelveErrorInterno($error);
}

