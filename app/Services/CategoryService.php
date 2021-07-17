<?php

namespace App\Services;

use App\Models\Category;
use stdClass;

class CategoryService
{
    public function updateOrCreate(stdClass $data): Category
    {
        $category = Category::where(['shortname' => $data->category])->first();

        if ($category) {
            return $category;
        }

        $category = new Category(['shortname' => $data->category]);

        $category->save();

        return $category;
    }

    public function getByShortname(string $shortname): Category | Null
    {
        return Category::where(['shortname' => $shortname])->first();
    }
}
