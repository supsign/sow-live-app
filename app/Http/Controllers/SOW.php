<?php

namespace App\Http\Controllers;

use App\Models\Stage;
use App\Models\Category;
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

 public function category(){

    return view('page.category');
                
                    }
}
