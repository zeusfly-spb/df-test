<?php

namespace App\Services;

use App\Category;

class CategoryService
{
    public function create(array $params)
    {
        Category::create($params);
    }
}