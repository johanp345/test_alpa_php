<?php

namespace App\Interface;

interface IModel
{
    public function searchBy(string $param, string $attr = ""): array;

    public function populate();
}
