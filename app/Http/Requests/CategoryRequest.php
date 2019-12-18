<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
            'name.required' => 'Le modèle du véhicule est obligatoire'
           
        ];
    }

    public function persist($id = null)
    {
        if(!is_null($id))
            $cate = Category::findOrFail($id);
        else
            $cate = new Category;

        $cate->name = $this->name;
      
        $cate->save();
    }
}
