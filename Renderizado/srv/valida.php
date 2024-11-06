<?php

require_once __DIR__ . "/../lib/php/BAD_REQUEST.php";
require_once __DIR__ . "/../lib/php/recuperaTexto.php";
require_once __DIR__ . "/../lib/php/ProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveJson.php";
require_once __DIR__ . "/../lib/php/devuelveProblemDetails.php";
require_once __DIR__ . "/../lib/php/devuelveErrorInterno.php";

try {
    // Recupera la respuesta de la adivinanza
    $respuesta = recuperaTexto("Adivinanza");

    // Verifica si el valor fue proporcionado
    if ($respuesta === false || $respuesta === "") {
        throw new ProblemDetails(
            status: BAD_REQUEST,
            title: "Falta la respuesta de la adivinanza.",
            type: "/error/faltaRespuesta.html"
        );
    }

    // Respuesta correcta
    $respuestaCorrecta = "las nubes";
    $resultado = (strtolower($respuesta) === $respuestaCorrecta)
        ? "¡Correcto! La respuesta es 'las nubes'."
        : "Respuesta incorrecta. Inténtalo de nuevo.";

    // Devuelve el resultado como JSON
    devuelveJson($resultado);
} catch (ProblemDetails $details) {
    devuelveProblemDetails($details);
} catch (Throwable $error) {
    devuelveErrorInterno($error);
}
