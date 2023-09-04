<?php
session_set_cookie_params(86400);

session_start();

// Verifica se a variável de sessão existe e defina um valor padrão se não existir
if (!isset($_SESSION['request_count'])) {
    $_SESSION['request_count'] = 0;
}

// Verifica se o usuário já excedeu o limite de 3 solicitações
if ($_SESSION['request_count'] >= 3) {
    http_response_code(403);
    echo 'Acesso negado! Você já excedeu o limite de solicitações.';
    exit;
}

// Incrementa o contador de solicitações
$_SESSION['request_count']++;

// Valida o host
$origin = $_SERVER['HTTP_HOST'];
$allowed_domains = [
  'https://semdesperdicio.eco.br',
    'https://www.semdesperdicio.eco.br',
    'https://semdesperdicio.eco.br/',
    'https://www.semdesperdicio.eco.br/',
    'semdesperdicio.eco.br',
];

require __DIR__ . '/vendor/autoload.php';
require_once(__DIR__ . '/config/database.php');
$config = require_once(__DIR__ . '/config/config.php');

use Orhanerday\OpenAi\OpenAi;


if (in_array($origin, $allowed_domains)) {

    $ingredients = $_GET['ingredients'];

    $open_ai = new OpenAi($config['OPEN_IA_KEY']);

    $prompt = "Você é um ex-chef de cozinha que trabalha em um blog que ajuda as pessoas a criarem pratos com os ingredients que tem em casa. Preciso que você me de o passo a passo de como construir uma refeição, prato de comida ou lanche com o que as pessoas tem em casa. Preciso que você crie um prato SOMENTE com o seguinte ingredientes:" . $ingredients;

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

    // Salva a receita no banco de dados
    $dbConnection = new Database(
        $config['DB_HOST'],
        $config['DB_USERNAME'],
        $config['DB_PASSWORD'],
        $config['DB_DATABASE']
    );
    
    $conn = $dbConnection->getConnection();
    
    $stmt = $conn->prepare("INSERT INTO recipes (ingredients, revenue, created_at) VALUES (?, ?, NOW())");
    $stmt->bind_param("ss", $ingredients, $recipeText);
    $result = $stmt->execute();

    // Retorna a resposta JSON para o frontend
    echo json_encode([
        'recipe' => $recipeText
    ]);

} else {
    http_response_code(403);
    echo 'Acesso negado! (Host não permitido)';
}
