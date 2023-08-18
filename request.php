<?php

$config = require_once(__DIR__ . '/config/config.php');

$promtp = "Você é um cozinheiro que trabalha em um restaurante. Preciso que você me de o passo a passo de como construir um prato de comida. O prato deve ser feito com os seguintes ingredientes: ".$_POST['ingredientes'];

$API_KEY = $config['OPEN_IA_KEY'];
$ORGANIZATION = $config['OPEN_IA_ORGANIZATION'];

$curl = curl_init();

curl_setopt_array($curl, [
    CURLOPT_URL => "https://api.openai.com/v1/engines/davinci/completions",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_2_0,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS => json_encode([
        'prompt' => $promtp,
        'max_tokens' => 1000,
        'temperature' => 0.9,
        'top_p' => 1,
        'frequency_penalty' => 0.0,
        'presence_penalty' => 0.0,
        'stop' => '\n',
    ]),
    CURLOPT_HTTPHEADER => [
        "Authorization: Bearer " . $API_KEY,
        "Content-Type: application/json",
    ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
    echo "Curl Error: " . $err;
} else {
    // Decodificar a resposta JSON
    $jsonResponse = json_decode($response, true);

    // Retornar a resposta em formato JSON
    header('Content-Type: application/json');
    echo json_encode($jsonResponse, JSON_PRETTY_PRINT);
}
