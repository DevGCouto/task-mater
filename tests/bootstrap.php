<?php
spl_autoload_register(function ($class) {
    $paths = [
        __DIR__ . '/../src/Model/' . $class . '.php',
        __DIR__ . '/../src/View/' . $class . '.php',
        __DIR__ . '/../src/Presenter/' . $class . '.php',
    ];
    
    foreach ($paths as $path) {
        if (file_exists($path)) {
            require_once $path;
            return;
        }
    }
});
