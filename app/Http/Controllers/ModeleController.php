<?php

namespace App\Http\Controllers;

use App\Marque;
use App\Modele;
use Illuminate\Http\Request;
use MercurySeries\Flashy\Flashy;
use App\Http\Requests\ModeleRequest;

class ModeleController extends Controller
{
    public function index()
    {
        $marques = Marque::orderBy('name')->get();
        $modeles = Modele::all();

        return view('modele.index', compact('marques', 'modeles'));

    }

    public function store()
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'marque_id' => 'required'
        ]);

        Modele::create(request(['name', 'marque_id']));

        return redirect()->back(); 
    }
    public function destroy($id)
    {
        $marModele = Modele::findOrFail($id);

        $marModele->delete();

        Flashy::success('Modele supprimé avec succès');

        return redirect()->back();
    }
    public function update( $id,ModeleRequest $form)
    { return 1;
        $form->persist($id);

        Flashy::success('Modele modifié avec succès');

        return redirect()->back();
    }
}
