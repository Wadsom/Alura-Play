<?php

require_once __DIR__ . '/../vendor/autoload.php';

if (!array_key_exists('PATH_INFO', $_SERVER) || $_SERVER['PATH_INFO'] === '/Lista') {
    require_once __DIR__ . '/../listagem-video.php';
}
else if ($_SERVER['PATH_INFO'] === '/novo-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } else if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../src/Controller/novo-video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/editar-video') {
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        require_once __DIR__ . '/../formulario.php';
    } elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once __DIR__ . '/../src/Service/editar_video.php';
    }
} else if ($_SERVER['PATH_INFO'] === '/remover-video') {
    require_once __DIR__ . '/../removendo-video.php';
}




