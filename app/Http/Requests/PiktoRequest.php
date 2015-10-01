<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class PiktoRequest extends Request
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
        $rules = [
            'image' => 'required|image',
        ];

        foreach($this->request->get('title') as $key => $val)
        {
            $rules['title.'.$key.'.title'] = 'required|max:255|min:1';
            $rules['title.'.$key.'.lang'] = 'required|max:255|min:1';
        }

        return $rules;
    }

    public function messages()
    {
        $messages = [];
        foreach($this->request->get('title') as $key => $val)
        {
            $messages['title.'.$key.'.title.required'] = 'Please fill all titles or delete unused fields.';
            $messages['title.'.$key.'.lang.required'] = 'Please fill all languages or delete unused fields.';
        }
return $messages;
    }
}
