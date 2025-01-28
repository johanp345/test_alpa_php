<?php

declare(strict_types=1);
require_once "./autoload.php";
App\Helpers\Helpers::LoadEnv();

use App\Models\ClaseModel;
use App\Models\ExamenModel;
use App\Views\TableView;
use PHPUnit\Framework\TestCase;

final class SimpleTest extends TestCase
{
    public function test_it_can_be_instantiated(): void
    {
        $clase = new ClaseModel();
        $examen = new ExamenModel();
        $view = new TableView();
        $this->assertInstanceOf(ClaseModel::class, $clase);
        $this->assertInstanceOf(ExamenModel::class, $examen);
        $this->assertInstanceOf(TableView::class, $view);
    }

    public function test_count_results(): void
    {
        $clase = new ClaseModel();
        $data = $clase->searchBy("%ingl%","name");
        $this->assertCount(2, $data);   
    }
    
    public function test_not_results(): void
    {
        $clase = new ClaseModel();
        $data = $clase->searchBy("%chinese%","name");
        $this->assertCount(0, $data);   
    }
}
