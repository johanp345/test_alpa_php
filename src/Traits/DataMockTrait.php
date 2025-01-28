<?php

namespace App\Traits;

/**
 * Trait para funcionalidades de data Dummy
 *
 * Se encarga de manejar la primera data de carga del sistema
 * si se quiere hacer el poblado inicial de las tablas
 * 
 * @since 1.0.0
 */
trait DataMockTrait
{
    public function getDataClase(): array
    {
        return [
            ["name" => "Inglés Escrito #2", "points" => 5],
            ["name" => "Francés Escrito", "points" => 4],
            ["name" => "Italiano Escrito", "points" => 2],
            ["name" => "Alemán Escrito", "points" => 3],
            ["name" => "Portugues Escrito", "points" => 1],
            ["name" => "Inglés Oral", "points" => 5],
            ["name" => "Francés Oral", "points" => 3],
            ["name" => "Italiano Oral", "points" => 2],
            ["name" => "Alemán Oral", "points" => 0],
            ["name" => "Portugues Oral", "points" => 1],
        ];
    }
    public function getDataExamen(): array
    {
        return [
            ["name" => "Exámen Inglés  Escrito", "type" => "Selección"],
            ["name" => "Exámen Francés  Escrito", "type" => "Pregunta y respuesta"],
            ["name" => "Exámen Italiano  Escrito", "type" => "Selección"],
            ["name" => "Exámen Alemán  Escrito", "type" => "Completación"],
            ["name" => "Exámen Portugues  Escrito", "type" => "Selección"],
            ["name" => "Exámen Inglés  Oral", "type" => "Pregunta y respuesta"],
            ["name" => "Exámen Francés  Oral", "type" => "Pregunta y respuesta"],
            ["name" => "Exámen Italiano  Oral", "type" => "Completación"],
            ["name" => "Exámen Alemán  Oral", "type" => "Completación"],
            ["name" => "Exámen Portugues  Oral", "type" => "Completación"],
            ["name" => "Exámen Inglés  Escrito #2", "type" => "Completación"],
            ["name" => "Exámen Francés  Escrito #2", "type" => "Selección"],
            ["name" => "Exámen Italiano  Escrito #2", "type" => "Completación"],
            ["name" => "Exámen Alemán  Escrito #2", "type" => "Preguntas y Respuestas"],
            ["name" => "Exámen Portugues  Escrito #2", "type" => "Completación"],
            ["name" => "Exámen Inglés  Oral", "type" => "Selección"],
            ["name" => "Exámen Francés  Oral", "type" => "Selección"],
            ["name" => "Exámen Italiano  Oral", "type" => "Completación"],
            ["name" => "Exámen Alemán  Oral", "type" => "Preguntas y Respuestas"],
            ["name" => "Exámen Portugues  Oral", "type" => "Completación"],
            ["name" => "Gramática Alemán  Escrito", "type" => "Completación"],
            ["name" => "Gramática Ingles ", "type" => "Completación"],
            ["name" => "Gramática Francés", "type" => "Completación"],
            ["name" => "Gramática Portugues  Escrito", "type" => "Completación"],
        ];
    }
}

