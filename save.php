<?php

$origin = $_SERVER['HTTP_HOST'];
$allowed_domains = [
    'https://semdesperdicio.eco.br',
    'https://www.semdesperdicio.eco.br',
    'https://semdesperdicio.eco.br/',
    'https://www.semdesperdicio.eco.br/',
    'semdesperdicio.eco.br',
];

require_once(__DIR__ . '/config/database.php');
$config = require_once(__DIR__ . '/config/config.php');


if (in_array($origin, $allowed_domains)) {

if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405);
    exit();
}

if (!isset($_GET['ingredients']) || !isset($_GET['revenue'])) {
    http_response_code(400);
    exit();
}

$ingredients = $_GET['ingredients'];
$revenue = $_GET['revenue'];

$dbConnection = new Database(
    $config['DB_HOST'],
    $config['DB_USERNAME'],
    $config['DB_PASSWORD'],
    $config['DB_DATABASE']
);

$conn = $dbConnection->getConnection();

// Preparar e executar a consulta para inserir a receita no banco de dados
$stmt = $conn->prepare("INSERT INTO recipes (ingredients, revenue, created_at) VALUES (?, ?, NOW())");
$stmt->bind_param("ss", $ingredients, $revenue);
$result = $stmt->execute();

if ($result) {
    http_response_code(201); // Created
} else {
    http_response_code(500); // Internal Server Error
}

$stmt->close();
$dbConnection->closeConnection();

} else {
    http_response_code(403);
    echo 'Acesso negado! (Host não permitido)';
}
