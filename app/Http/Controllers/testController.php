<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class testController extends Controller
{
    public function affichePage()
    {
        $nom = "nihed";
        $age = 29;
        $names = ["asma","nihed","maha"];
        return view  ('page')->with("var",$nom)->with("age",$age)->with("names",$names);
    }
}
