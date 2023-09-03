<?php
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'http://mysite1.com',
    'https://www.mysite2.com',
    'http://www.mysite2.com',
];

echo 'Origin: ' . $origin . '<br>';
echo 'Domains: ' . implode(', ', $allowed_domains) . '<br>';
echo 'This domain: ' . $_SERVER['HTTP_HOST'] . '<br>';
echo 'Allowed: ' . (in_array($origin, $allowed_domains) ? 'yes' : 'no') . '<br>';
echo 'Allowed: ' . (in_array($_SERVER['HTTP_HOST'], $allowed_domains) ? 'yes' : 'no') . '<br>';
```