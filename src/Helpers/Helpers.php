<?php

namespace App\Helpers;

use Exception;

/**
 * clase para manejar funciones auxiliares
 *
 * @since 1.0.0
 *
 */
class Helpers
{
    public function __construct() {}

    /**
     * Carga de variables de ambiente
     *
     * Valida si existe archivo .env y valida linea por linea 
     * las variables declaradas para agregarlas a la variable 
     * global $_ENV
     *
     * @since 1.0.0
     *
     */
    public static function LoadEnv($envFile = ".env")
    {
        if (!file_exists($envFile)) {
            throw new Exception("El archivo .env no existe.");
        }

        $lines = file($envFile);
        foreach ($lines as $line) {
            // Ignorar líneas vacías o comentarios
            if (trim($line) === '' || strpos(trim($line), '#') === 0) {
                continue;
            }

            list($key, $value) = explode('=', $line, 2);
            $_ENV[trim($key)] = trim($value);
        }
    }
}
