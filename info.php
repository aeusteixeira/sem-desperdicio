<?php
if (isset($_SERVER['HTTP_ORIGIN'])) {
    $origin = $_SERVER['HTTP_ORIGIN'];
    $allowed_domains = [
        'https://semdesperdicio.eco.br/',
    ];

    if (in_array($origin, $allowed_domains)) {
        header('Access-Control-Allow-Origin: ' . $origin);
        echo 'API is working';
    } else {
        echo 'API is not allowed';
    }
} else {
    echo 'No origin';
}
?>
