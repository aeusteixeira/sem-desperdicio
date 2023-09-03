<?php
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'https://semdesperdicio.eco.br',
    'https://www.semdesperdicio.eco.br',
    'https://semdesperdicio.eco.br/',
    'https://www.semdesperdicio.eco.br/',
    'semdesperdicio.eco.br',
    'localhost',
    'localhost:8080',
    'localhost/sem-desperdicio',
];

echo 'Origin: ' . $origin . '<br>';
echo 'Domains: ' . implode(', ', $allowed_domains) . '<br>';
echo 'This domain: ' . $_SERVER['HTTP_HOST'] . '<br>';
echo 'Allowed: ' . (in_array($origin, $allowed_domains) ? 'yes' : 'no') . '<br>';
echo 'Allowed: ' . (in_array($_SERVER['HTTP_HOST'], $allowed_domains) ? 'yes' : 'no') . '<br>';