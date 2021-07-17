<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Category;
use App\Models\Start;
use Illuminate\Http\Request;

class SOW extends Controller
{
    public function competition(){


        $stages = Stage::all();

        return view('page.competition', compact('stages'));

    }

    public function stage(Stage $stage){

        $categories = Category::all();

        return view('page.stage', compact(['stage', 'categories']));


    }

 public function category(Stage $stage, Category $category){


$category_starts = Start::where(['stage_id' => $stage->id ,'category_id' =>$category->id])->get();


    return view('page.category', compact('stage','category','category_starts'));
                
    }
}
