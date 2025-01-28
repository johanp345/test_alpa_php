<?php

namespace App\Views;

/**
 * Clase para formateo de la vista de datos para el usuario
 *
 * Formatea la data encontrada para presentar al usuario
 * una data legible y mejor organizada 
 * 
 * @since 1.0.0
 *
 */
class TableView
{
    public function __construct() {}

    public function renderTables($dataClase = [], $dataExamen = [], $arg = "")
    {
        echo "\nResultados para la búsqueda de '\033[31m$arg\033[0m':\n\n";
        $this->renderClases($dataClase);
        echo "\n\n";
        $this->renderExamenes($dataExamen);
        echo "\n\n";
    }
    /**
     * Funcion para mostrar la data de las clases
     * 
     * @since 1.0.0
     *
     */    private function renderClases($dataClase)
    {
        if(count($dataClase)===0){
            echo "\033[31m\nNo se han encontrado coincidencias para Clases\033[0m\n";
            return;
        }
        $lengsClase = $this->getHeaderLength($dataClase);
        $tableClase = "\033[34m| Entidad | Nombre";
        $tableClase .= str_repeat(" ", $lengsClase["name"] - 3);
        $tableClase .= "| Ponderación |\033[0m\n";
        $tableClase .= "|---------|";
        $tableClase .= str_repeat("-", $lengsClase["name"] + 4);
        $tableClase .= "|-------------|\n";
        foreach ($dataClase as $row) {
            $tableClase .= "| \033[33mClase\033[0m   | " . $row["name"];
            $tableClase .= str_repeat(" ", $lengsClase["name"] - mb_strlen($row["name"], "UTF-8") + 3);
            $tableClase .= "| $row[points]/5         |\n";
            $tableClase .= "|---------|";
            $tableClase .= str_repeat("-", $lengsClase["name"] + 4);
            $tableClase .= "|-------------|\n";
        }
        echo $tableClase;
    }
    /**
     * Funcion para mostrar la data de los examenes
     * 
     * @since 1.0.0
     *
     */
    private function renderExamenes($dataExamen)
    {
        if(count($dataExamen)===0){
            echo "\033[31m\nNo se han encontrado coincidencias para Examenes\033[0m\n";
            return;
        }
        $lengsExamen = $this->getHeaderLength($dataExamen);
        $tableExamen = "\033[34m| Entidad | Nombre";
        $tableExamen .= str_repeat(" ", $lengsExamen["name"] - 3);
        $tableExamen .= "| Tipo";
        $tableExamen .= str_repeat(" ", $lengsExamen["type"] - 1);
        $tableExamen .= "|\033[0m\n";
        $tableExamen .= "|---------|";
        $tableExamen .= str_repeat("-", $lengsExamen["name"] + 4);
        $tableExamen .= "|";
        $tableExamen .= str_repeat("-", $lengsExamen["type"] + 4);
        $tableExamen .= "|\n";
        foreach ($dataExamen as $row) {
            $tableExamen .= "| \033[36mExámen\033[0m  | " . $row["name"];
            $tableExamen .= str_repeat(" ", $lengsExamen["name"] - mb_strlen($row["name"], "UTF-8") + 3);
            $tableExamen .= "| $row[type]";
            $tableExamen .= str_repeat(" ", $lengsExamen["type"] - mb_strlen($row["type"], "UTF-8") + 3);
            $tableExamen .= "|\n";
            $tableExamen .= "|---------|";
            $tableExamen .= str_repeat("-", $lengsExamen["name"] + 4);
            $tableExamen .= "|";
            $tableExamen .= str_repeat("-", $lengsExamen["type"] + 4);
            $tableExamen .= "|\n";
        }
        echo $tableExamen;
    }

    /**
     * Funcion para definir tamaño de las celdas
     *
     * Se encarga de encontrar el texto mas largo del array 
     * y de esa manera crear celdas del mismo tamaño para ese 
     * tipo de datos y que se vea una tabla uniforme
     * 
     * @since 1.0.0
     *
     */
    private function getHeaderLength(array $data,): array
    {
        $length = [];
        foreach ($data as $row) {
            foreach ($row as $key => $value) {
                if (!isset($length[$key]) || $length[$key] < strlen($value)) {
                    $length[$key] = mb_strlen($value, "UTF-8");
                }
            }
        }
        return $length;
    }
}
