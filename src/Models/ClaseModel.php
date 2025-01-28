<?php

namespace App\Models;
use App\Traits\DataMockTrait;

/**
 * Clase para menejo de modelo Clase 
 *
 *
 * @see GenericModel
 * 
 * @since 1.0.0
 *
 */
class ClaseModel extends GenericModel
{
    use DataMockTrait;
    public function __construct() {
        parent::__construct();
        $this->table_name = "clase";
        $this->query_create = "CREATE TABLE clase (id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(150), points SMALLINT)";
        $this->query_insert ="INSERT INTO clase (name, points) VALUES (:name, :points)";
        $this->data_dummy = $this->getDataClase();
    }
}
