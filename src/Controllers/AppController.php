<?php

namespace App\Controllers;

use App\Models\ClaseModel;
use App\Models\ExamenModel;
use App\Traits\DataMockTrait;
use App\Views\TableView;
/**
 * Controlador para Funcionalidades segun parámetro
 *
 * Arrancaría la aplicacòn y  según el argumento pasado 
 * realizará la funcionalidad correspondiente 
 *
 * @since 1.0.0
 */ 
class AppController
{
    use DataMockTrait;
    public ?array $argv = null;
    public function __construct() {}

    public static function runApp(?array $argv): void
    {
        switch ($variable = $argv[1] ?? null) {
            case 'search':
                self::search($argv);
                break;
            case 'search-first':
                self::searchFirst($argv);
                break;
            case 'populate':
                self::populateDb();
                break;
            default:
                echo "\033[31m\nNo ha ingresado una opción válida, por favor intente de nuevo\033[0m\n\n";
                echo "Para realizar una búsqueda use: \033[31msearch {valor}\033[0m (Sin las llaves) \n\n";
                echo "Mostrar primeros resultados use: \033[32msearch-first {valor}\033[0m (Sin las llaves) \n\n";
                echo "Para popular Base de datos use: \033[33mpopulate\033[0m  \n\n";
                break;
        }
    }

    public static function populateDb()
    {
        $claseModel = new ClaseModel();
        $examenModel = new ExamenModel();

        $claseModel->populate();
        $examenModel->populate();
    }

    public static function search(array $argv): void
    {
        if (isset($argv[2])) {
            $claseModel = new ClaseModel();
            $examenModel = new ExamenModel();
            $view = new TableView();
            $data_clases = $claseModel->searchBy("%".substr($argv[2],0,3)."%", "name, points");
            $data_examen = $examenModel->searchBy("%".substr($argv[2],0,3)."%", "name, type");
            $view->renderTables($data_clases, $data_examen, $argv[2]);
        } else {
            echo "\033[31m\nNo ha ingresado un parámetro de búsqueda, por favor intente de nuevo\033[0m\n\n";
            echo "Para realizar una búsqueda use: \033[32msearch {valor}\033[0m (Sin las llaves) \n\n";
            echo "Mostrar primeros resultados use: \033[33msearch-first {valor}\033[0m (Sin las llaves) \n\n";
        }
    }
    public static function searchFirst(array $argv): void
    {
        if (isset($argv[2])) {
            $claseModel = new ClaseModel();
            $examenModel = new ExamenModel();
            $view = new TableView();
            $data_clases = $claseModel->searchFirstBy("%".substr($argv[2],0,3)."%", "name, points");
            $data_examen = $examenModel->searchFirstBy("%".substr($argv[2],0,3)."%", "name, type");
            $view->renderTables($data_clases, $data_examen, $argv[2]);
        } else {
            echo "\033[31m\nNo ha ingresado un parámetro de búsqueda, por favor intente de nuevo\033[0m\n\n";
            echo "Para realizar una búsqueda use: \033[32msearch {valor}\033[0m (Sin las llaves) \n\n";
            echo "Mostrar primeros resultados use: \033[33msearch-first {valor}\033[0m (Sin las llaves) \n\n";
        }
    }
}
