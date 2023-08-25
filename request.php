<?php

require __DIR__ . '/vendor/autoload.php';
$config = require_once(__DIR__ . '/config/config.php');
use Orhanerday\OpenAi\OpenAi;

$ingredients = $_GET['ingredients'];

$open_ai = new OpenAi($config['OPEN_IA_KEY']);

$prompt = "Você é um ex-chef de cozinha que trabalha em um blog que ajuda as pessoas a criarem pratos com os ingredients que tem em casa. Preciso que você me de o passo a passo de como construir uma refeição, prato de comida ou lanche com o que as pessoas tem em casa. O que o cliente te passou foi:" . $ingredients;

$response = $open_ai->completion([
    'model' => 'text-davinci-002',
    'prompt' => $prompt,
    'temperature' => 0.9,
    'max_tokens' => 1200,
    'frequency_penalty' => 0,
    'presence_penalty' => 0.6,
]);

$jsonResponse = json_decode($response, true);
$recipeText = $jsonResponse['choices'][0]['text'];

// Define o cabeçalho Content-Type para indicar que o conteúdo é JSON
header('Content-Type: application/json');

// Retorna a resposta JSON para o frontend
echo json_encode([
    'recipe' => $recipeText
]);

