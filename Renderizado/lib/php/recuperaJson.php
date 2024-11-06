<?php
function recuperaJson() {
    $url = "https://randomuser.me/api/";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        throw new Exception("Error: " . curl_error($ch));
    }
    curl_close($ch);

    $json = json_decode($response, true);
    if (json_last_error() !== JSON_ERROR_NONE) {
        throw new Exception("Error al decodificar el JSON.");
    }

    return $json;
}


?>