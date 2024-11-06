<?php

require_once __DIR__ . "/../lib/php/devuelveJson.php";

devuelveJson([
    "nombre" => ["value" => "pp"],
    "libroFavorito" => ["value" => "No tengo"],
    "deportePreferido" => ["value" => "futbol"],
    "animalFavorito" => ["value" => "perro"],
    "edad" => ["valueAsNumber" => 25],
    "numero" => ["value" => 7],
    "gustaCocinar" => ["checked" => true],
    "gracioso" => ["value" => false],
    "tieneMascota" => ["value" => "si"],
    "direccion" => ["textContent" => "San marqueña no 11 colonia benito juarez"],
    "serieFavorita" => ["innerHTML" => "Tu serie favorita"],
    "nacimiento" => ["value" => "1999-05-15"],
    "imagen1" => [
        "src" => "https://utn.edomex.gob.mx/sites/utn.edomex.gob.mx/files/images/acerca_de_la_utn/logo_300px_400px.png"
    ],
    "imagen2" => ["src" => "https://www.solusoft.es/Info/Imagenes/desarrollo-de-software/img_hero.svg"],
    "pasatiempos[]" => ["pintura", "correr"],
    "nocturno" => ["si"],
    "colores[]" => ["rojo", "azul"],
]);
