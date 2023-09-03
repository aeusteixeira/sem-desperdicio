<?php
$origin = $_SERVER['HTTP_ORIGIN'];
$allowed_domains = [
    'http://mysite1.com',
    'https://www.mysite2.com',
    'http://www.mysite2.com',
];

var_dump($origin, $allowed_domains, in_array($origin, $allowed_domains));