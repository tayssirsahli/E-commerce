<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function categoryPage(){
        return view('Admin.categories.lister');
    }

    public function AddCategory(Request $request){

        $c=new Category();
        $c->name = $request->name;
        $c->description = $request->description;

        if($c->save()){
            return redirect()->route('categories')->with('success', 'Catégorie ajoutée avec succès');
            //return "categorie ajouter";
        }else{
            return "erreur d'ajouter ";
        }
    }

    public function allcategory(){
        $categories = Category::all();

        return view('Admin.categories.lister')->with("category",$categories);

    }


    public function deleteCat(Request $req){

        $category = Category::find($req->id);
        $category->delete();
        return redirect()->route('categories');
    }
    //edit 
    public function recherchEdite(Request $req){

        $category = Category::find($req->id);
        return view('Admin.categories.editCategory')->with("category",$category);
    }

    public function update(Request $req){

        $category = Category::find($req->id);
        $category->update([
            'name'=>$req->name,
            'description' => $req->description,
        ]);
        return redirect()->route('dashboard');
    }
}
