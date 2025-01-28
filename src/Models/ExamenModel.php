<?php

namespace App\Models;
use App\Traits\DataMockTrait;

/**
 * Clase para menejo de modelo Examen 
 *
 *
 * @see GenericModel
 * 
 * @since 1.0.0
 *
 */
class ExamenModel extends GenericModel
{

    use DataMockTrait;
    public function __construct()
    {
        parent::__construct();
        $this->table_name = "examen";
        $this->query_create = "CREATE TABLE examen (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(150), type VARCHAR(50))";
        $this->query_insert = "INSERT INTO examen (name, type) VALUES (:name, :type)";
        $this->data_dummy = $this->getDataExamen();
    }
}
