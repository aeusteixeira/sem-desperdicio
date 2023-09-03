<?php
// Lista de domínios permitidos
$allowedOrigins = [
    'https://semdesperdicio.eco.br', // Adicione seu domínio aqui
    'http://localhost',
    'http://localhost/sem-desperdicio',
];

// Verifica se o cabeçalho "Origin" está presente na requisição
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $origin = $_SERVER['HTTP_ORIGIN'];

    // Verifica se a origem está na lista de domínios permitidos
    if (in_array($origin, $allowedOrigins)) {
        // Retorne "OK" se a origem estiver permitida
        echo "OK";
    } else {
        // Retorne um erro se a origem não estiver na lista permitida
        http_response_code(403); // Código de status "Proibido"
        echo "Acesso negado! (HTTP_ORIGIN não permitido)";
    }
} else {
    // Retorne "OK" se o cabeçalho "Origin" não estiver presente
    echo "OK";
}
?>
