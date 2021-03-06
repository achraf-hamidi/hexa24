<?php

namespace App\Http\Requests;

use App\Modele;
use Illuminate\Foundation\Http\FormRequest;

class  ModeleRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required',
            

        ];
    }

    public function messages()
    {
        return [
            'modele_id.required' => 'Le modèle du véhicule est obligatoire',
           
        ];
    }

    public function persist($id = null)
    {
        if(!is_null($id))
            $mod = Modele::findOrFail($id);
        else
            $mod = new Modele;

        $mod->name = $this->name;
      
        $mod->save();
    }
}
