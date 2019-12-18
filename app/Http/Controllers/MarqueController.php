<?php

namespace App\Http\Controllers;

use App\Marque;
use Illuminate\Http\Request;
use App\Http\Requests\MarqueRequest;
use MercurySeries\Flashy\Flashy;



class MarqueController extends Controller
{
    public function index()
    {
        $marques = Marque::all();
        return view('marque.index', compact('marques'));   
    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3'
        ]);

        Marque::create(request(['name']));

        return redirect()->back();
    }
    public function destroy($id)
    {
        $marModele = Marque::findOrFail($id);

        $marModele->delete();

        Flashy::success('Marque supprimé avec succès');

        return redirect()->back();
    }
    public function update( $id,MarqueRequest $form)
    {   
        
        $form->persist($id);
  
        Flashy::success('Marque modifié avec succès');

        return redirect()->back();
    }
}
