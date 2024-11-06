<?php

// Permitir CORS si es necesario
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

function recuperaJson() {
    $url = "https://randomuser.me/api/";
    $response = file_get_contents($url);
    
    if ($response === false) {
        throw new Exception("No se pudo obtener datos de la API.");
    }

    // Decodificar el JSON
    $json = json_decode($response);

    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON.");
    }

    return $json;
}

try {
    // Obtener datos desde la API Random User
    $userData = recuperaJson();

    // Verificar que se hayan obtenido datos correctamente
    if (!isset($userData->results) || !isset($userData->results[0])) {
        throw new Exception("No se encontraron datos de usuario.");
    }

    $user = $userData->results[0];
    $gender = $user->gender;
    $title = $user->name->title;
    $firstName = $user->name->first;
    $lastName = $user->name->last;
    $fullName = "$title $firstName $lastName";
    $username = $user->login->username;
    $email = $user->email;
    $address = [
        "street" => $user->location->street->number . ' ' . $user->location->street->name,
        "city" => $user->location->city,
        "state" => $user->location->state,
        "postcode" => $user->location->postcode
    ];
    $phone = $user->phone;
    $cell = $user->cell;

    // Preparar el array de respuesta
    $resultado = [
        'genero' => $gender,
        'nombre_completo' => $fullName,
        'usuario' => $username,
        'correo' => $email,
        'direccion' => $address,
        'telefono' => $phone,
        'celular' => $cell
    ];

    // Enviar los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($resultado);

} catch (Exception $e) {
    http_response_code(400);
    echo json_encode(["error" => $e->getMessage()]);
}

?>