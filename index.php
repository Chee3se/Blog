<?php

$url = parse_url($_SERVER['REQUEST_URI'])["path"];
$dir = 'controllers/';

switch ($url) {
    case '':
    case '/':
        require $dir.'index.php';
        break;

    case '/about':
        require $dir.'about.php';
        break;

    case '/story':
        require $dir.'story.php';
        break;

    default:
        http_response_code(404);
        require $dir.'404.php';
}