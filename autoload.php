<?php
spl_autoload_register(function ($class) {
    // prefijo del namespace
    $prefix = 'App\\';
    // defino directorio base
    $base_dir = __DIR__ . '/src/';
    // calcular largo del prefijo y valido que la clase cuente con el prefijo
    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        // no, move to the next registered autoloader
        return;
    }

    // busco el nombre de la clase que deberia ser el mismo del archivo
    $relative_class = substr($class, $len);

    // reemplazo el backslash y creo la ruta del archivo a importar
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    // si existe el archivo lo requiero
    if (file_exists($file)) {
        require $file;
    }

    $archivos = scandir(__DIR__ . '/src/Interfaces/');

    // Iterar sobre los archivos, ignorando . y .. para cargar las interfaces
    foreach ($archivos as $archivo) {
        if (
            pathinfo(
                $archivo,
                PATHINFO_EXTENSION
            ) === 'php'
            && $archivo != '.'
            && $archivo != '..'
        ) {
            require_once(__DIR__ . '/src/Interfaces/' . $archivo);
        }
    }
});
