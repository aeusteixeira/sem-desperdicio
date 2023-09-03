<?php
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'https://semdesperdicio.eco.br/',
];

if (in_array($origin, $allowed_domains)) {
    header('Access-Control-Allow-Origin: ' . $origin);
    echo 'Hello, world!';
}else{
    echo 'Not allowed';
}