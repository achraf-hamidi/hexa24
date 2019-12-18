<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category.index', compact('categories'));
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        Category::create(request(['name']));

        return redirect()->back();
    }
   
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);

        $categories->delete();

        Flashy::success('categories supprimé avec succès');

        return redirect()->back();
    }
    public function update( $id,Request $form)
    {
        return $id ;
        $form->persist($id);

        Flashy::success('cat modifié avec succès');

        return redirect()->back();
    }
}
